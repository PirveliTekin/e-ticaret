<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestHomeEditAbout extends FormRequest
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
            'title'=>'required|min:3',
            'short_dis'=>'required|min:10',
            'long_dis'=>'required|min:20',
        ];
    }

    /**
     * @return string[]
     *
     */
    public function messages()
    {
        return [
            'title.required'=>'About alanı boş bırakılamaz.',
            'short_dis.required'=>'Short Description alanı boş bırakalmamalıdır.',
            'short_dis.min'=>'Short Description alanı en az 10 karakterli olmalıdır.',
            'long_dis.required'=>'Long Description alanı boş bırakalmamalıdır.',
            'long_dis.min'=>'Long Description alanı en az 20 karakterli olmalıdır.'
        ];
    }
}
