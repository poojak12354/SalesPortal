<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpworkFormRequest extends FormRequest
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
            'up_name' => [
                'required',
                'max:50'

            ],
            'up_link' => [
                'required'

            ],
        ];
        return $rules;
    }
    public function messages()
    {
        return [
            'up_name.required' => 'This field is required.',
            'up_link.required' => 'This field is required.',
        ];
    }
}
