<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMarkRequest extends FormRequest
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
            'student_id'=>['required',Rule::unique('marks')->ignore($this->id)->where('term', $this->term)
            ],
            'maths'=>'required|integer|min:0|max:100',
            'science'=>'required|integer|min:0|max:100',
            'history'=>'required|integer|min:0|max:100',
            'term'=>'required'
        ];
    }

    public function messages()
    {

        return [
        'student_id.required' => 'Student name is required',
        'student_id.unique' => 'Student mark is already added for this term',
        ];
    }
}
