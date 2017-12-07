<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeEvents extends FormRequest
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
            'title'           => 'bail|required|string',
            'date'            => 'bail|required|numeric',
            'backgroundColor' => 'bail|required|string',
            'borderColor'     => 'bail|required|string',
        ];
    }
}
