<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestAdminEditContact extends FormRequest
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
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
            'address'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'E-mail alanı boş bırakılamaz.',
            'email.email'=>'Geçerli bir mail giriniz.',
            'phone.regex'=>'Bu telefon numarası değildir.',
            'phone.min'=>'Bu telefon numarası en az 10 karakter olmalıdır.Örnek : 5xx74xxxxx',
            'phone.max'=>'Telefon numarası  en fazla 10 kararterden fazla olmamalıdır.Örnek : 5xx74xxxxx',
            'phone.required'=>'Telefon alanı boş bırakılamaz.',
            'address.required'=>'Adres alanı boş bırakılamaz.',


        ];
    }
}
