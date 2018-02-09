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
            'username'             => 'bail|required|min:8|alpha_num',
            'password'             => 'min:8|nullable',
            'first_name'           => 'bail|required|alpha|max:255',
            'middle_name'          => 'bail|required|alpha|max:255',
            'last_name'            => 'bail|required|alpha|max:255',
            'age'                  => 'bail|required|integer|max:255',
            'section_id'           => 'bail|nullable|integer',
            'gender'               => 'bail|required|gender|max:255',
            'birthday'             => 'bail|required|date',
            'birth_place'          => 'bail|required|string|max:255',
            'nationality'          => 'bail|required|alpha_num_spaces|max:255',
            'religion'             => 'bail|required|alpha_num_spaces|max:255',
            'school_last_attended' => 'bail|required|string|max:255',
            'level_applied'        => 'bail|required|string|max:255',
            'mother_name'          => 'bail|required|alpha_num_spaces|max:255',
            'mother_age'           => 'bail|required|integer|max:255',
            'mother_nationality'   => 'bail|required|alpha_num_spaces|max:255',
            'mother_occupation'    => 'bail|required|alpha_num_spaces|max:255',
            'mother_contact'       => 'bail|required|numeric',
            'mother_work_address'  => 'bail|required|string|max:255',
            'father_name'          => 'bail|required|alpha_num_spaces|max:255',
            'father_age'           => 'bail|required|integer|max:255',
            'father_nationality'   => 'bail|required|alpha_num_spaces|max:255',
            'father_occupation'    => 'bail|required|alpha_num_spaces|max:255',
            'father_contact'       => 'bail|required|numeric',
            'father_work_address'  => 'bail|required|string|max:255',
        ];
    }
}
