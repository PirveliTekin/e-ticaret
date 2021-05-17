<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUserUpdate extends FormRequest
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
            'email' => 'required|email',
            'name' => 'required|min:3|max:50',

        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'E-mail alanı boş bırakılamaz.',
            'email.email'=>'Geçerli bir mail giriniz.',
            'name.required'=>'İsim Alanı alanı boş bırakılamaz.',
            'name.min'=>'İsim Alanı minimum 3 karakter olabilir.',
            'name.max'=>'İsim Alanı maksimum 50 karakter olabilir.',


        ];
    }
}
