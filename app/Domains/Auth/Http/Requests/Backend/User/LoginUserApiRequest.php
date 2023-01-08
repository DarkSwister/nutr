<?php

namespace App\Domains\Auth\Http\Requests\Backend\User;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreUserRequest.
 */
class LoginUserApiRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'max:255', 'email','exists:users,email'],
//            'password' => ['required','max:100'],
        ];
    }

}
