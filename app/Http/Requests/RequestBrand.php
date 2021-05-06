<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestBrand extends FormRequest
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
            'brand_name'=>'required|unique:brands|min:3',
            'brand_image'=>'required|mimes:jpg,jpeg,png'
        ];
    }
    public function messages()
    {
        return [
            'brand_name.required'=>'Brand alanı boş bırakılamaz.',
            'brand_name.min'=>'Brand alanı en az 3 karakterli olmalıdır.',
            'brand_image.required'=>'Resim alanı boş bırakılamaz.',
            'brand_image.mimes'=>'Dosyanın uzantısı jpg,jpeg veya png olmalıdır.'
        ];
    }
}
