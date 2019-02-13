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
            'country' =>'required'|'between:3,5'|'alpha',
            'grade' =>'required',
            'name' =>'required'|'between:3,40',
            'department' =>'required'|'between:2,3'|'numeric',
            'town' =>'required'|'between:2,40'
        ];
    }
}
