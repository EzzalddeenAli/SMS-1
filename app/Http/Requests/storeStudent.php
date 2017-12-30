<?php

namespace App\Http\Requests;

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
            'username'    => 'bail|required|unique:students|min:8|alpha_num',
            'password'    => 'bail|required|min:8',
            'first_name'  => 'bail|required|string',
            'middle_name' => 'bail|required|string',
            'last_name'   => 'bail|required|string',
            'age'         => 'bail|required|integer',
            'section_id'  => 'bail|required|integer',
        ];
    }
}
