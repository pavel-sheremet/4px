<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
{
    /**s
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
            'name' => 'required|max:255',
            'logo' => 'image|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('section.validation.name.required'),
            'name.max' => __('section.validation.name.max'),
            'logo.image' => __('section.validation.logo.image'),
            'logo.max' => __('section.validation.logo.max'),
        ];
    }
}
