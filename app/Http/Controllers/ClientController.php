<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $clients = $user->clients()->get();
        return Inertia('Clients/Index', [
            'clients' => $clients,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia('Clients/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $data = $request->validate([
            'company' => 'required|string',
            'nip' => 'required|string|max:13|unique:clients', // Nip francuski ma 13 cyfr
            'type' => 'required|string',
            'country' => 'required|string',
            'street' => 'required|string',
            'city' => 'required|string',
            'zip_code' => 'required|string',
            'person' => 'nullable|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'note' => 'nullable|string',
        ]);

        $user->clients()->create($data);
        return redirect()->route('client.index')->with('success', 'Klient został dodany.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return Inertia('Clients/Show', [
            'client' => $client,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return Inertia('Clients/Edit', [
            'client' => $client,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $user = Auth::user();
        $data = $request->validate([
            'company' => 'required|string',
            'nip' => 'required|string|max:13|unique:clients,nip'.$user->id, // Nip francuski ma 13 cyfr
            'type' => 'required|string',
            'country' => 'required|string',
            'street' => 'required|string',
            'city' => 'required|string',
            'zip_code' => 'required|string',
            'person' => 'string',
            'email' => 'required|email',
            'phone' => '',
            'note' => 'string',
        ]);

        $client->update($data);
        return redirect()->route('client.index')->with('success', 'Klient został zaktualizowany.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('client.index')->with('success', 'Klient został usunięty.');
    }
}
