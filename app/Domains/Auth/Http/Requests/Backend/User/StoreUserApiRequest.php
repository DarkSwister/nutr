<?php

namespace App\Domains\Auth\Http\Requests\Backend\User;

use App\Rules\PhoneNumber;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

/**
 * Class StoreUserRequest.
 */
class StoreUserApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $failed = $validator->errors();
        $messages = '';
        foreach ($failed->getMessages() as $field => $msg) {
            $messages .= implode(' ', $msg) . ' ';
        }
        throw new HttpResponseException(response()->json([
            'message' => $messages
        ], 422));
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'We need to know your email address!',
            'email.unique' => 'Email address is already taken.',
            'email.email' => 'Email field has syntax error.',
            'phone.unique' => 'Phone number is already taken.',
            'phone.min' => 'Your phone number is too short.',
            'avatar.url' => 'Your avatar has incorrect url.',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'max:255', 'email', Rule::unique('users')->ignore($this->user()->id)],
            'phone' => ['sometimes', 'min:10', Rule::unique('users')->ignore($this->user()->id), new PhoneNumber],
            'avatar' => ['sometimes', 'url'],
        ];
    }

}
