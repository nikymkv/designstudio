<?php

namespace App\Http\Requests\Admin\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
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
            'email' => 'required|email|unique:employees,email,'.request()->employee->id,
            'dob' => 'required|date|date_format:Y-m-d',
            'phone' => 'required|string|max:20',
            'payment_type_id' => 'required|numeric',
            'hourly_payment' => 'nullable|numeric',
            'is_admin' => 'sometimes|numeric',
            'specs' => 'required|array',
            'password' => request()->input('password') !== null
                            ? 'required|string|min:4|confirmed'
                            : '',
        ];
    }
}
