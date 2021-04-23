<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'name_company' => 'required|string|min:3|max:191',
            'scope' => 'required|string|min:3|max:191',
            'date_created' => 'required|date',
            'deadline' => 'nullable|date|after:date_created',
            'proposed_payment' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'current_employee_id' => 'required|numeric',
            'client_id' => 'required|numeric',
            'service_id' => 'required|numeric',
            'description' => 'nullable|string|max:32000',
        ];
    }
}
