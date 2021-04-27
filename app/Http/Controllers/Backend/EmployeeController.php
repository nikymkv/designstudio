<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeSpecializations;
use App\Models\Specialization;
use App\Models\Project;
use App\Models\PaymentType;
use App\Http\Requests\Admin\Employee\StoreEmployeeRequest;
use App\Http\Requests\Admin\Employee\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        if ( ! $this->isAdmin()) {
            return redirect()->back();
        }

        $spec = $request->input('spec_id') ?? null;
        if (isset($spec)) {
            $employeesID = EmployeeSpecializations::where('specialization_id', $spec)
                ->pluck('employee_id')
                ->toArray();
            $employees = Employee::whereIn('id', $employeesID)->get();
        } else {
            $employees = Employee::all();
        }
        $specs = Specialization::all();
        
        return view('backend.employees.index', \compact('employees', 'specs'));
    }

    public function create()
    {
        if ( ! $this->isAdmin()) {
            return redirect()->back();
        }

        $paymentType = PaymentType::all();

        return view('backend.employees.create', compact('paymentType'));
    }

    public function store(StoreEmployeeRequest $request, Employee $employee)
    {
        if ( ! $this->isAdmin()) {
            return redirect()->back();
        }

        $validated = $request->validated();
        $employee->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => \Hash::make($validated['name']),
            'dob' => $validated['dob'],
            'phone' => $validated['phone'],
            'payment_type_id' => $validated['payment_type_id'],
            'hourly_payment' => $validated['hourly_payment'] ?? 0.00,
        ]);

        if ( ! isset($employee)) {
            return back();
        }

        $paymentType = PaymentType::all();
        return view('backend.employees.create', compact('paymentType'));
    }

    public function show(Request $request, Employee $employee)
    {
        if ( ! $this->isAdmin()) {
            if ( \Auth::guard('backend')->user()->id != $employee->id) {
                return redirect()->back();
            }
        }
        $paymentType = PaymentType::all();
        $type = $request->input('param');
        $enTab = 0;
        if ($type == 1) {
            $projects = Project::where('current_status_id', 23)
                ->where('current_employee_id', $employee->id)
                ->get();
            $enTab = 1;
        } else {
            $projects = Project::where('current_status_id', '!=', 23)
                ->where('current_employee_id', $employee->id)
                ->get();
        }

        return view('backend.employees.show', \compact('employee', 'projects', 'enTab', 'paymentType'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        if ( ! $this->isAdmin()) {
            return redirect()->back();
        }

        $employee->update($request->all());
        if ( ! isset($employee)) {
            return back();
        }

        return back();
    }

    public function destroy(Employee $employee)
    {
        if ( ! $this->isAdmin()) {
            return redirect()->back();
        }
    }

    protected function isAdmin()
    {
        return (bool) \Auth::guard('backend')->user()->is_admin;
    }
}
