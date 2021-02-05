<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *  @OA\Xml(name="StoreUserRequest"),
 *  @OA\Property(property="name", type="string"),
 *  @OA\Property(property="email", type="string"),
 *  @OA\Property(property="password", type="string"),
 *  required={"name","email","password"}
 * )
 */
class StoreUserRequest extends FormRequest
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
            'name'     => 'required|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required',
        ];
    }


    /**
     * Get messages for validation errors.
     * To return an JSON array with errors, the request must include the header 'Accept: application/json'
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.*'         => 'Please, type in the user\'s name (max 255 characters).',
            'email.required' => 'Please, type in the user\'s email.',
            'email.email'    => 'Please, type in a valid email.',
            'email.unique'   => 'This email is already in use.',
            'password.*'     => 'Please, type in a password.',
        ];
    }
}
