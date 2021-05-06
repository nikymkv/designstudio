<?php

namespace App\Http\Controllers\Backend;

use App\Models\Project;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Dompdf\Dompdf;
use View;
use Carbon\Carbon;

class PdfController extends Controller
{

    protected $pdf;

    public function __construct()
    {
        $this->pdf = new Dompdf();
    }

    public function handleEmployees(Request $request)
    {
        $typeEvent = (int)$request->input('typeEvent');
        $startDate = $request->input('startDate') ?? NULL;
        $endDate = $request->input('endDate') ?? NULL;

        if ($typeEvent == 1) { // Дата рождения
            if ($startDate && $endDate) {
                $data['employees'] = Employee::whereBetween('dob', [$startDate, $endDate])->get();
            } else if ($startDate) {
                $data['employees'] = Employee::where('dob', $startDate)->get();
            }
        } else if ($typeEvent == 2) { // Дата принятия
            if ($startDate && $endDate) {
                $data['employees'] = Employee::whereBetween('hired', [$startDate, $endDate])->get();
            } else if ($startDate) {
                $data['employees'] = Employee::where('hired', $startDate)->get();
            }
        } else if ($typeEvent == 3) { // Дата увольнения
            if ($startDate && $endDate) {
                $data['employees'] = Employee::whereBetween('dismissed', [$startDate, $endDate])->get();
            } else if ($startDate) {
                $data['employees'] = Employee::where('dismissed', $startDate)->get();
            }
        } else {
            abort(404);
        }

        $this->generatePdf('backend.pdf.employees.employees', $data, true);

        return $this->pdf->stream('employees.pdf');
    }

    public function handleEmployee(Request $request)
    {
        $employeeId = $request->input('employee_id');
        $data['employee'] = Employee::findOrFail($employeeId);
        if ($data['employee']) {
            $data['projects'] = Project::where('current_employee_id', $data['employee']->id)->get();
            $this->generatePdf('backend.pdf.employees.employee', $data, true);
            return $this->pdf->stream('employee_'.$data['employee']->id.'.pdf');
        } else {
            abort(404);
        }
    }

    public function handleProjects(Request $request)
    {
        $startDate = $request->input('startDate') ?? NULL;
        $endDate = $request->input('endDate') ?? NULL;

        if ($startDate && $endDate) {
            $data['projects'] = Project::whereBetween('date_created', [$startDate, $endDate])->get();
        } else if ($startDate) {
            $data['projects'] = Project::where('date_created', $startDate)->get();
        } else {
            abort(404);
        }

        $this->generatePdf('backend.pdf.projects.projects', $data, true);

        return $this->pdf->stream('projects.pdf');
    }

    public function handleProject(Request $request)
    {
        $projectId = $request->input('project_id');
        $data['project'] = Project::findOrFail($projectId);
        if ($data['project']) {
            $this->generatePdf('backend.pdf.projects.project', $data, false);
            return $this->pdf->stream('project_'.$data['project']->id.'.pdf');
        } else {
            abort(404);
        }
    }

    public function generatePdf(string $view, array $data, bool $landscape)
    {
        $view = view($view, compact('data'));
        $this->pdf->loadHtml($view->render());
        $landscape ? $this->pdf->setPaper('A4', 'landscape') : null;
        $this->pdf->render();
    }
}
