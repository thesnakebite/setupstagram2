<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
            'image' => 'required|mimes:jpg,jpeg,png|max:2000'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Tiene que seleccionar una imagen',
            'image.mimes' => 'La imagen tiene un formato no valido',
            'image.max' => 'La imagen no debe exceder de 2MB'
        ];
    }
}
