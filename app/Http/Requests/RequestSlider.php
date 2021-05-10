<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestSlider extends FormRequest
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
            'title'=>'required|unique:sliders|min:3',
            'description'=>'required|unique:sliders|min:10',
            'image'=>'required|mimes:jpg,jpeg,png'
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'Title alanı boş bırakılamaz.',
            'title.min'=>'Title alanı en az 3 karakterli olmalıdır.',
            'description.required'=>'Description alanı boş bırakılamaz.',
            'description.min'=>'Description  alanı en az 10 karakterli olmalıdır.',
            'image.required'=>'Resim alanı boş bırakılamaz.',
            'image.mimes'=>'Resim uzantısı jpg,jpeg veya png olmalıdır.'
        ];
    }
}
