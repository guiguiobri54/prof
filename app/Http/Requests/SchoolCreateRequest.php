<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchoolCreateRequest extends FormRequest
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
            //
            'country' =>'required|min:3|max:30|alpha',
            'grade' =>'required',
            'name' =>'required|min:3|max:40',
            'department' =>'required|numeric',
            'town' =>'required|between:2,40'
        ];
    }

    Public function messages()
    {
        return [

        ];
    }
}
