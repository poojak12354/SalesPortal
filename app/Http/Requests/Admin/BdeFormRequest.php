<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BdeFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules =  [
            'name' => [
                'required'
            ],
            'email' => [
                'required',
                'email',
                'max:191',
                'unique:users',

            ],
            'target' => [
                'required'
            ],
            'pwd' => [
                'required',
            ],
            'pwd_confirmation' => [
                'required',
                'same:pwd'
            ]
        ];
        return $rules;
    }
    public function messages()
    {
        return [
            'name.required' => 'This field is required.',
            'email.required' => 'This field is required.',
            'email.email' => 'This email is already used.',
            'target.required' => 'This field is required.',
            'pwd.required' => 'This field is required.',
            'pwd_confirmation.required' => 'Password did not match.',
            'pwd_confirmation.same' => 'The Password and Re-enter Password must same.',
        ];
    }
}
