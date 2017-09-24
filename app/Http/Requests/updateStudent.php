<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateStudent extends FormRequest
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
            'username' => 'bail|required|min:8|alpha_num',
            'password' => 'min:8|nullable',
            'first_name' => 'bail|required|alpha',
            'middle_name' => 'bail|required|alpha',
            'last_name' => 'bail|required|alpha',
            'age' => 'bail|required|integer',
            'section_id' => 'bail|required|integer',
        ];
    }
}
