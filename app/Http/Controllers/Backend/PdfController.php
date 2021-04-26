<?php

namespace App\Http\Controllers\Backend;

use App\Models\Project;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class PdfController extends Controller
{
    public function settings()
    {
        return view('backend.pdf.settings');
    }

    public function handle(Request $request)
    {
        $modelType = $request->get('model_type') ?? null;
        if (isset($modelType) && $modelType == 1) { // сотрудники
            $pdf = $this->generateEmployeePdf($request->input());
        } else if(isset($modelType) && $modelType == 2) {
            $pdf = $this->generateProjectPdf($request->input());
        }

        return $pdf->stream('document.pdf');
    }


    public function generateProjectPdf(array $input)
    {
        $all = $input['all'] ?? null;
        if (isset($all)) {
            $projects = Project::all();
            $pdf = PDF::loadView('backend.pdf.projects.projects', compact('projects'));
        } else {
            $project = Project::find($input['model_id']);
            $pdf = PDF::loadView('backend.pdf.projects.project', compact('project'));
        }

        return $pdf;
    }
    
    public function generateEmployeePdf(array $input)
    {
        $all = $input['all'] ?? null;
        if (isset($all)) {
            $employees = Employee::find($input['model_id']);
            $pdf = PDF::loadView('backend.pdf.employees.employees', compact('employees'));
        } else {
            $employee = Employee::find($input['model_id']);
            $projects = Project::where('current_employee_id', $input['model_id'])->get();
            $pdf = PDF::loadView('backend.pdf.employees.employee', compact('employee', 'projects'));
        }

        return $pdf;
    }

}
