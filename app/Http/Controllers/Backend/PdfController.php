<?php

namespace App\Http\Controllers\Backend;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class PdfController extends Controller
{
    public function preview(Request $request)
    {
        $project = Project::find(1);
        $pdf = PDF::loadView('backend.pdf.projects.project', compact('project'));

        return $pdf->stream('project.pdf');
    }

    public function download(Request $request)
    {

    }
}
