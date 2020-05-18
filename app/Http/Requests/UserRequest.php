<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email,',
        ];

        if ($this->route()->hasParameter('user'))
            $rules['email'] .= $this->route('user')->id;
        else
            $rules['password'] = 'min:8|required';

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => __('validation.required', ['attribute' => __('user.edit.name.label')]),
            'name.max' => __('validation.max', ['attribute' => __('user.edit.name.label')]),
            'email.required' => __('validation.required', ['attribute' => __('user.edit.email.label')]),
            'password.required' => __('validation.required', ['attribute' => __('user.edit.password.label')]),
            'password.min' => __('validation.min', ['attribute' => __('user.edit.password.label')])
        ];
    }
}
