<?php

namespace App\Domains\Auth\Http\Controllers\Frontend\Auth;

use App\Actions\Fortify\PasswordValidationRules;
use App\Domains\Auth\Services\UserService;
use App\Models\Invitation;
use App\Rules\Captcha;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;

/**
 * Class RegisterController.
 */
class RegisterController
{

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    use PasswordValidationRules;

    /**
     * @var UserService
     */
    protected $userService;

    /**
     * RegisterController constructor.
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Where to redirect users after registration.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route(homeRoute());
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm(Request $request)
    {
        abort_unless(config('boilerplate.access.user.registration'), 404);
        $invitation_token = $request->get('invitation_token');
        $invitation = Invitation::where('invitation_token', $invitation_token)->first();
        $email = $invitation->email ?? null;
        return view('auth.register', compact('email'))->with(['group_id' => $invitation->group_id ?? null]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'group_id' => ['nullable', 'exists:groups,id'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')],
            'password' => $this->passwordRules(),
            'terms' => ['required', 'in:1'],
            'g-recaptcha-response' => ['required_if:captcha_status,true', new Captcha],
        ], [
            'terms.required' => __('You must accept the Terms & Conditions.'),
            'g-recaptcha-response.required_if' => __('validation.required', ['attribute' => 'captcha']),
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Domains\Auth\Models\User|mixed
     *
     * @throws \App\Domains\Auth\Exceptions\RegisterException
     */
    protected function create(array $data)
    {
        abort_unless(config('boilerplate.access.user.registration'), 404);

        return $this->userService->registerUser($data);
    }
}
