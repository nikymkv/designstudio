<?php

namespace App\Http\Controllers\Backend;

use App\Models\Project;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Dompdf\Dompdf;
use View;

class PdfController extends Controller
{

    protected $pdf;

    public function __construct()
    {
        $this->pdf = new Dompdf();
    }

    public function settings()
    {
        $dates = Project::selectRaw("DATE_FORMAT(date_created, '%Y') as date_created")
            ->orderBy('date_created', 'desc')
            ->groupBy('date_created')
            ->pluck('date_created');
        return view('backend.pdf.settings', compact('dates'));
    }

    public function handle(Request $request)
    {
        $modelType = $request->get('model_type') ?? null;
        if (isset($modelType) && $modelType == 1) { // сотрудники
            $this->generateEmployeePdf($request->input());
        } else if(isset($modelType) && $modelType == 2) {
            $this->generateProjectPdf($request->input());
        }

        return $this->pdf->stream('document.pdf');
    }


    public function generateProjectPdf(array $input)
    {
        $all = $input['all'] ?? null;
        if (isset($all)) {
            $projects = isset($input['date_created'])
                        ? Project::whereYear('date_created', $input['date_created'])->get()
                        : Project::all();
            $view = view('backend.pdf.projects.projects', compact('projects'));
            $this->pdf->loadHtml($view->render());
            $this->pdf->setPaper('A4', 'landscape');
        } else {
            $project = Project::findOrFail($input['model_id']);
            $view = view('backend.pdf.projects.project', compact('project'));
            $this->pdf->loadHtml($view->render());
        }
        $this->pdf->render();
    }
    
    public function generateEmployeePdf(array $input)
    {
        $all = $input['all'] ?? null;
        if (isset($all)) {
            $employees = Employee::all();
            $view = view('backend.pdf.employees.employees', compact('employees'));
            $this->pdf->loadHtml($view->render());
            $this->pdf->setPaper('A4', 'landscape');
        } else {
            $employee = Employee::findOrFail($input['model_id']);
            $projects = Project::where('current_employee_id', $input['model_id'])->get();
            $view = view('backend.pdf.employees.employee', compact('employee', 'projects'));
            $this->pdf->loadHtml($view->render());
        }
        $this->pdf->render();
    }

}
