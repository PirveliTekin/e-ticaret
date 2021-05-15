<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestContact extends FormRequest
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
            'name' => 'required|min:3',
            'email' => 'required|email',
            'subject' => 'required|min:10',
            'message'=>'required|min:20'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Name alanı boş bırakılamaz.',
            'name.min'=>'Name alanı en az 3 karater olmalıdır.',
            'subject.required'=>'Subject alanı boş bırakılamaz.',
            'subject.min'=>'Subject alanı en az 10 karakter olmaılıdır',
            'email.required'=>'Email alanı boş bırakılamaz',
            'email.email'=>'Bu email değildir',
            'message.required'=>'Message alanı boş bırakılamaz',
            'message.min'=>'Mesagge alanı en az 20 karateer olmalıdır.',


        ];
    }
}
