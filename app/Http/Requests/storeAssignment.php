<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeAssignment extends FormRequest
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
            'title'         => 'bail|required|string',
            'description'   => 'bail|required|string|max:50',
            'deadline_date' => 'bail|required|date_format:"Y-m-d"',
            'deadline_time' => 'bail|required|date_format:"H:i"',
            'subject_id'    => 'bail|required|numeric',
        ];
    }
}
