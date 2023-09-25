<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserbidFormRequest extends FormRequest
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
            'job_link' => [
                'required'
            ],
            'name' => [
                'required'
            ],
            'up_id' => [
                'required'
            ],
            'up_date' => [
                'required'
            ],
            'optionsReply' => [
                'required'
            ],
            'budget.*' => [
                ''
            ]
        ];

        if (request()->get('optionsReply') == '3') {
            $rules += [
                'budget' => 'required|gt:0',
            ];
        } else {
            $rules += [
                'budget' => 'required',
            ];
        }
        return $rules;
    }
    public function messages()
    {
        return [
            'job_link.required' => 'Please paste the Job link.',
            'name.required' => 'Please add the client name.',
            'optionsReply.required' => "Please select atleast one option.",
            'budget.required' => "Please enter the budget.",
            'budget.gt' => "The budget must be greater then 0"

        ];
    }
}
