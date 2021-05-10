<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Client;
use App\Models\Status;
use App\Models\ProjectStatus;
use App\Http\Requests\StoreFormProjectRequest;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class WebhookController extends Controller
{
    public function createProject(Request $request, Project $project)
    {
        $validator = Validator::make($request->all(), [
            'url' => 'sometimes|string',
            'site-type' => 'sometimes|string',
            'site-modules' => 'sometimes|string',
            'gamma' => 'required|string',
            'photo' => 'sometimes|string',
            'content' => 'sometimes|string',
            'celi' => 'required|string|max:255',
            'sroki' => 'required|date|date_format:d-m-Y',
            'cost' => 'required|numeric',
            'name' => 'required|string',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',

            'project-name' => 'sometimes|string|max:255',
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        } 

        $input = $request->only([
            'url', 'site-type', 'site-modules', 'gamma', 'photo', 'content', 'celi', 'sroki', 'cost', 'name', 'email', 'phone', 'project-name'
        ]);

        $deadline = Carbon::createFromFormat('d-m-Y', $input['sroki'])->format('Y-m-d');

        // подготовка данных
        try {
            $client = Client::where('email', $input['email'])
                            ->firstOrFail();   
        } catch (\Exception $e) {
            return response()->json(['message'=>'bad request(client)'], 400);
        }

        try {
            $services = [
                'Интернет-магазин' => 1,
                'Корпоративный сайт' => 2,
                'Лендинг' => 3,
                'Квиз' => 4,
            ];

            $service_id = 0;

            if ( isset($input['site-type']) ) {
                $service_id = $services[trim($input['site-type'])];
            } elseif ( isset($input['project-name']) ) {
                $service_id = 5;
            }

            $status = Status::findOrFail($service_id);
        } catch (\Exception $e) {
            return response()->json(['message'=>'bad request(service)'], 400);
        }

        $project = $project->create([
            'name_company' => $input['project-name'] ?? 'Без названия',
            'scope' => '',
            'date_created' => now(),
            'deadline' => $deadline,
            'proposed_payment' => $input['cost'],
            'current_employee_id' => 1,
            'client_id' => $client->id,
            'current_status_id' => $status->id,
            'service_id' => $service_id,
            'description' => '',
            'answers' => $request->only([
                'url', 'site-modules', 'gamma', 'photo', 'content', 'celi'
            ]),
        ]);

        $status = Status::join('service_statuses', 'statuses.id', '=', 'service_statuses.status_id')
                        ->where('service_statuses.service_id', $project->service_id)
                        ->select('service_statuses.status_id as id')
                        ->orderBy('service_statuses.status_id', 'asc')
                        ->get()
                        ->first();

        ProjectStatus::create([
            'status_id' => $status->id,
            'project_id' => $project->id,
            'employee_id' => $project->current_employee_id,
            'date_created' => now(),
        ]);

        return response()
            ->json([
                'message'=> 'success',
            ], 200);
    }
}
