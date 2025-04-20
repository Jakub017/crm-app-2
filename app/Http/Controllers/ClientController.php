<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $api_token = Crypt::decryptString($user->fakturownia_api_key);
        $login = Crypt::decryptString($user->fakturownia_login);

        $clients = Http::get('https://'. $login .'.fakturownia.pl/clients.json', [
            'api_token' => $api_token,
        ])->json();


        return Inertia('Clients/Index', [
            'clients' => $clients,
        ]);
    }

    public function get($name) 
    {
        $user = Auth::user();
        $api_token = Crypt::decryptString($user->fakturownia_api_key);
        $login = Crypt::decryptString($user->fakturownia_login);

        $client_info = Http::get('https://'. $login .'.fakturownia.pl/clients.json', [
            'api_token' => $api_token,
            'name' => $name
        ])->json()[0];
       
        return response()->json($client_info);
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        $api_token = Crypt::decryptString($user->fakturownia_api_key);
        $login = Crypt::decryptString($user->fakturownia_login);

        $clients = Http::get('https://'. $login .'.fakturownia.pl/clients.json', [
            'api_token' => $api_token,
            'name' => $request->name,
        ])->json();

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
        $api_token = Crypt::decryptString($user->fakturownia_api_key);
        $login = Crypt::decryptString($user->fakturownia_login);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tax_no' => 'nullable|string|max:20',
            'register_number' => 'nullable|string|max:20',
            'street' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'post_code' => 'nullable|string|max:6|regex:/^\d{2}-\d{3}$/',
            'bank' => 'nullable|string|max:255',
            'bank_account' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'www' => 'nullable|string|max:255',
            'note' => 'nullable|string|max:255',
        ]);

        Http::post('https://'. $login .'.fakturownia.pl/clients.json', [
            'api_token' => $api_token,
            'client' => $validated,
        ])->json();

        return redirect()->route('client.index')->with('success', 'Klient został dodany.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = Auth::user();
        $api_token = Crypt::decryptString($user->fakturownia_api_key);
        $login = Crypt::decryptString($user->fakturownia_login);

        $client = Http::get('https://'. $login .'.fakturownia.pl/clients/'. $id .'.json', [
            'api_token' => $api_token,
        ])->json();

        return Inertia('Clients/Show', [
            'client' => $client,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client, $id)
    {
        $user = Auth::user();
        $api_token = Crypt::decryptString($user->fakturownia_api_key);
        $login = Crypt::decryptString($user->fakturownia_login);

        $client = Http::get('https://'. $login .'.fakturownia.pl/clients/'. $id .'.json', [
            'api_token' => $api_token,
        ])->json();

        return Inertia('Clients/Edit', [
            'client' => $client,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $api_token = Crypt::decryptString($user->fakturownia_api_key);
        $login = Crypt::decryptString($user->fakturownia_login);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tax_no' => 'nullable|string|max:20',
            'register_number' => 'nullable|string|max:20',
            'street' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'post_code' => 'nullable|string|max:6|regex:/^\d{2}-\d{3}$/',
            'bank' => 'nullable|string|max:255',
            'bank_account' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'www' => 'nullable|string|max:255',
            'note' => 'nullable|string|max:255',
        ]);

        $payload = $validated;
        $payload['shortcut'] = $validated['name'];

        Http::put('https://'. $login .'.fakturownia.pl/clients/'. $id .'.json', [
            'api_token' => $api_token,
            'client' => $payload,
        ])->json();

        return redirect()->route('client.index')->with('success', 'Klient został zaktualizowany.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $api_token = Crypt::decryptString($user->fakturownia_api_key);
        $login = Crypt::decryptString($user->fakturownia_login);

        Http::delete('https://'. $login .'.fakturownia.pl/clients/'. $id .'.json', [
            'api_token' => $api_token,
        ])->json();
        
        return redirect()->route('client.index')->with('success', 'Klient został usunięty.');
    }
}
