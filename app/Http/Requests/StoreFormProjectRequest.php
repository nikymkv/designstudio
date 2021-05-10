<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormProjectRequest extends FormRequest
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
            'url' => 'sometimes|string',
            'site-type' => 'sometimes|string',
            'site-modules' => 'sometimes|string',
            'gamma' => 'sometimes|string',
            'photo' => 'sometimes|string',
            'content' => 'sometimes|string',
            'celi' => 'sometimes|string|max:255',
            'sroki' => 'sometimes|date|date_format:d-m-Y',
            'cost' => 'sometimes|numeric',
            'name' => 'required|string',
            'phone' => 'required|string|max:15',
            'email' => 'required|email',

            'project-name' => 'sometimes|string|max:255',
        ];
    }
}
