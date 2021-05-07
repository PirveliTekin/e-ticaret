<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestBrandEdit extends FormRequest
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
            'brand_name'=>'required|min:3',

        ];
    }
    public function messages()
    {
        return [
            'brand_name.required'=>'Brand alanı boş bırakılamaz.',
            'brand_name.min'=>'Brand alanı en az 3 karakterli olmalıdır.',

        ];
    }
}
