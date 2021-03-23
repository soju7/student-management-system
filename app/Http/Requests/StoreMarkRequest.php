<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreMarkRequest extends FormRequest
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
            'student_id'=>['required',Rule::unique('marks')
            ->where('term', $this->term)
            ],
            'maths'=>'required|integer',
            'science'=>'required|integer',
            'history'=>'required|integer',
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
