<?php

namespace App\Http\Requests;

use App\Rules\validLevel;
use Illuminate\Foundation\Http\FormRequest;

class storeStudent extends FormRequest
{
    //The URI to redirect to if validation fails.
    protected $redirect = '/admin/find/basic?user=student&func=student-list';

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
            //student data
            'lrn'                    => 'bail|required|numeric',
            'username'               => 'bail|required|unique:students|min:8|alpha_num',
            'password'               => 'bail|required|min:8',
            'first_name'             => 'bail|required|string',
            'middle_name'            => 'bail|required|string',
            'last_name'              => 'bail|required|string',
            'age'                    => 'bail|required|integer',
            'section_id'             => 'bail|required|integer',
            //personal data
            'gender'                 => 'bail|required|string',
            'birthday'               => 'bail|required|date',
            'birth_place'            => 'bail|nullable|string',
            'nationality'            => 'bail|required|string',
            'religion'               => 'bail|nullable|string',
            'school_last_attended'   => 'bail|nullable|string',
            'level_applied'          => 'bail|nullable|string',
            //family background
            'mother_name'            => 'bail|nullable|string',
            'mother_age'             => 'bail|nullable|integer',
            'mother_nationality'     => 'bail|nullable|string',
            'mother_occupation'      => 'bail|nullable|string',
            'mother_contact'         => 'bail|nullable|string',
            'mother_work_address'    => 'bail|nullable|string',
            'father_name'            => 'bail|nullable|string',
            'father_age'             => 'bail|nullable|integer',
            'father_nationality'     => 'bail|nullable|string',
            'father_occupation'      => 'bail|nullable|string',
            'father_contact'         => 'bail|nullable|string',
            'father_work_address'    => 'bail|nullable|string',
            //Educational Background
            'level.*'                => 'bail|required|array|level',
            'level.*.name_of_school' => 'bail|nullable|alpha_num_spaces|required_with:level.*.year_attended',
            'level.*.year_attended'  => 'bail|nullable|date|required_with:level.*.name_of_school',
            'level.*.honors_awards'  => 'bail|nullable|alpha_num_spaces|nullable',
        ];
    }
}
