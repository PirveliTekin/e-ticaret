<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestChangePassword extends FormRequest
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
            'current_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'


        ];
    }
    public function messages()
    {
        return [
            'current_password.required'=>'Current password alanı boş bırakılamaz.',
            'password.required'=>'New password alanı boş bırakılamaz.',
            'password.confirmed'=>'Password alanları eşleşmiyor.',
            'password_confirmation.required'=>'Confirm Password alanı boş bırakılamaz.',


        ];
    }
}
