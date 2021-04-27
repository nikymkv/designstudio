<?php

namespace App\Http\Requests\Admin\Employee;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'name' => 'required|string|min:2',
            'email' => 'required|email|unique:employees,email',
            'password' => 'required|string|min:4|confirmed',
            'dob' => 'required|date|date_format:Y-m-d',
            'phone' => 'required|string|max:15',
            'payment_type_id' => 'required|numeric',
            'hourly_payment' => 'nullable|numeric',
            'is_admin' => 'sometimes|numeric',
        ];
    }
}
