<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Client\UpdateClientRequest;
use App\Models\Client;
use Auth;

class ClientController extends Controller
{
    public function show()
    {
        $client = Auth::guard('web')->user();

        return view('web.client.show', compact('client'));
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $validated = $request->validated();
        $client->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => isset($validated['password']) 
                            ? \Hash::make($validated['password'])
                            : $client->password,
        ]);

        return back();
    }
}
