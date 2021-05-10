<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Project;
use App\Http\Requests\Client\UpdateClientRequest;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();

        return view('backend.clients.index', \compact('clients'));
    }

    public function show(Client $client)
    {
        $projects = Project::where('client_id', $client->id)->get();

        return view('backend.clients.show', compact('client', 'projects'));
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->validated());

        return redirect()->route('backend.clients.index');
    }
}
