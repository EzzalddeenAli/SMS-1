<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateImage extends FormRequest
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
            'path' => 'bail|image',
            'type' => 'bail|required|alpha',
            'title' => 'bail|string|nullable',
            'description' => 'bail|string|nullable',
            'position' => 'bail|required|numeric',
        ];
    }
}
