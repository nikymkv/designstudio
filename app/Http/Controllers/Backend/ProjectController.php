<?php

namespace App\Http\Controllers\Backend;

use App\Models\Project;
use App\Models\ProjectService;
use App\Models\ProjectStatus;
use App\Models\Status;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if (\Auth::guard('backend')->user()->is_admin) {
            $type = $request->input('param');
            $enTab = 0;
            if ($type == 1) {
                $projects = Project::where('current_status_id', 23)
                ->orderBy('date_created', 'desc')
                ->get();
                $enTab = 1;
            } else {
                $projects = Project::where('current_status_id', '!=', 23)
                ->orderBy('date_created', 'desc')
                ->get();
            }

            return view('backend.project.index', compact('projects', 'enTab'));
        } else {
            $type = $request->input('param');
            $enTab = 0;
            if ($type == 1) {
                $projects = Project::with(['service', 'client'])->where('current_status_id', 23)
                ->select([
                    'projects.id AS id',
                    'projects.date_created AS date_created',
                    'projects.name_company AS name_company',
                    'projects.service_id AS service_id',
                    'projects.client_id AS client_id',
                ])
                ->join('project_employees', 'projects.id', 'project_employees.project_id')
                ->join('employees', 'project_employees.employee_id', 'employees.id')
                ->where('employees.id', \Auth::guard('backend')->user()->id)
                ->orderBy('date_created', 'desc')
                ->get();
                $enTab = 1;
            } else {
                $projects = Project::with(['service', 'client'])->where('current_status_id', '!=', 23)
                ->select([
                    'projects.id AS id',
                    'projects.date_created AS date_created',
                    'projects.name_company AS name_company',
                    'projects.service_id AS service_id',
                    'projects.client_id AS client_id',
                ])
                ->join('project_employees', 'projects.id', 'project_employees.project_id')
                ->join('employees', 'project_employees.employee_id', 'employees.id')
                ->where('employees.id', \Auth::guard('backend')->user()->id)
                ->orderBy('date_created', 'desc')
                ->get();
            }

            return view('backend.project.index', compact('projects', 'enTab'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $statuses = Status::join('service_statuses', 'service_statuses.status_id', '=', 'statuses.id')
                            ->where('service_statuses.service_id', $project->service_id)
                            ->select('statuses.id', 'statuses.name')
                            ->get();
        $employees = Employee::all();

        return view('backend.project.show', compact('project', 'statuses', 'employees'));
    }

    public function create(Request $request, Client $client)
    {
        $services = Service::all();
        $employees = Employee::all();

        return view('backend.project.create', \compact('client', 'services', 'employees'));
    }

    public function store(StoreProjectRequest $request, Project $project)
    {
        $validated = $request->validated();
        $status = Status::join('service_statuses', 'statuses.id', '=', 'service_statuses.status_id')
                        ->where('service_statuses.service_id', $validated['service_id'])
                        ->select('service_statuses.status_id as id')
                        ->orderBy('service_statuses.status_id', 'asc')
                        ->get()
                        ->first();

        $validated['current_status_id'] = $status->id;
        
        $project = $project->create($validated);

        $project->currentEmployees()->attach($validated['current_employees_id']);

        ProjectStatus::create([
            'status_id' => $status->id,
            'project_id' => $project->id,
            'date_created' => now(),
        ]);

        return redirect()->route('backend.projects');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('backend.project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $input = $request->only(['name_company', 'scope', 'date_created', 'deadline', 'proposed_payment', 'price', 'current_employees_id', 'client_id', 'current_status_id', 'service_id', 'description']);

        if ((int)$project->current_status_id != (int)$input['current_status_id']) {
            ProjectStatus::create([
                'status_id' => $input['current_status_id'],
                'project_id' => $project->id,
                'date_created' => now(),
            ]);
        }

        $project->update([
            'name_company' => $input['name_company'],
            'scope' => $input['scope'],
            'date_created' => $input['date_created'],
            'deadline' => $input['deadline'],
            'proposed_payment' => $input['proposed_payment'],
            'price' => $input['price'],
            'current_status_id' => (int)$input['current_status_id'] != (int)$project->current_status_id ? $input['current_status_id'] : $project->current_status_id,
            'description' => $input['description'],
        ]);

        $project->currentEmployees()->sync($input['current_employees_id']);

        return redirect()->route('backend.projects.show', ['project' => $project]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        ProjectStatus::where('project_id', $project->id)->delete();
        $project->delete();

        return redirect()->route('backend.projects');
    }
}
