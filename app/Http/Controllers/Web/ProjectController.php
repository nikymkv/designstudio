<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Auth;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->input('param');
        $enTab = 0;
        if ($type == 1) {
            $projects = Project::with('status')
                ->where('current_status_id', 23)
                ->where('client_id', Auth::guard('web')->user()->id)
                ->get();
            $enTab = 1;
        } else {
            $projects = Project::with('status')
                ->where('current_status_id', '!=', 23)
                ->where('client_id', Auth::guard('web')->user()->id)
                ->get();
        }

        return view('web.projects.index', compact('projects', 'enTab'));
    }

    public function show(Project $project) {
        return view('web.projects.show', compact('project'));
    }
}
