<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $api_token = Crypt::decryptString($user->fakturownia_api_key);
        $login = Crypt::decryptString($user->fakturownia_login);

        $invoices = Http::get('https://'. $login .'.fakturownia.pl/invoices.json', [
            'api_token' => $api_token,
        ])->json();
      
        return Inertia('Invoices/Index', [
            'invoices' => $invoices,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $api_token = Crypt::decryptString($user->fakturownia_api_key);
        $login = Crypt::decryptString($user->fakturownia_login);
        $today = Carbon::now();

        $clients = Http::get('https://'. $login .'.fakturownia.pl/clients.json', [
            'api_token' => $api_token,
        ])->json();

        return Inertia('Invoices/Create', [
            'clients' => $clients,
            'today' => $today,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $api_token = Crypt::decryptString($user->fakturownia_api_key);
        $login = Crypt::decryptString($user->fakturownia_login);

        $validated_invoice = $request->validate([
            'buyer_name' => 'required|max:255',
            'issue_date' => 'required|date',
            'payment_to' => 'required|date',
            'buyer_email' => 'required|email',
            'buyer_tax_no' => 'required|numeric',
        ]);

        $seller_info = Http::get('https://'. $login .'.fakturownia.pl/departments.json', [
            'api_token' => $api_token,
        ])->json();

        $invoice = $validated_invoice;
        $invoice['seller_name'] = $seller_info[0]['name'];
        $invoice['seller_tax_no'] = $seller_info[0]['tax_no'];
        $invoice['kind'] = "vat";
        $invoice['sell_date'] = $validated_invoice['issue_date'];

        $buyer_info = Http::get('https://'. $login .'.fakturownia.pl/clients.json', [
            'api_token' => $api_token,
            'name' => $validated_invoice['buyer_name'],
        ])->json();

        $validated_positions = $request->validate([
            'positions' => 'array|required',
            'positions.*.name' => 'required|max:255',
            'positions.*.quantity' => 'required|numeric',
            'positions.*.tax' => 'required|numeric',
            'positions.*.total_price_gross' => 'required|numeric',
        ]);

        $invoice['positions'] = $validated_positions['positions'];

        $response = Http::post('https://'. $login .'.fakturownia.pl/invoices.json', [
            'api_token' => $api_token,
            'invoice' => $invoice,
        ])->json();

        dd($response);

        return redirect()->route('invoice.index')->with('success', 'Faktura wystawiona pomyślnie');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
