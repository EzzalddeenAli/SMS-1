<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateTeacher extends FormRequest
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
            'username' => 'required|bail|min:8|alpha_num',
            'password' => 'min:8|nullable',
            'first_name' => 'required|bail|alpha',
            'middle_name' => 'required|bail|alpha',
            'last_name' => 'required|bail|alpha',
            'age' => 'required|bail|integer',
            'advisory' => 'integer|bail|nullable',
        ];
    }
}
