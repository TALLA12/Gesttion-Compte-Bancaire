<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\AccountType;
use App\Models\compte;
use Illuminate\Http\Request;

class CompteController extends Controller
{
    public  function index()
    {
        return View("compte.index",[
            "comptes" => compte::with('client','accountType')->get()
        ]);
    }

    public  function create()
    {
        return View("compte.create",[
            "clients" => Client::all(),
            "typeCompte" => AccountType::all(),
        ]);
    }

    public  function store(Request $request)
    {
       $compte = new compte();
       $compte->solde = $request->solde;
       $compte->client_id = $request->client_id;
       $compte->account_type_id = $request->type_account;
       $compte->save();
       return redirect()->back();
    }
    public function edit($id)
    {
        $compte = Compte::findOrFail($id);
        $clients = Client::all();
        $accountTypes = AccountType::all();

        return view('compte.edit', compact('compte', 'clients', 'accountTypes'));
    }
    public function delete($id)
    {
        $compte = Compte::findOrFail($id);
        $compte->delete();

        return redirect()->route('compte.list')->with('success', 'Compte supprimé avec succès');
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'solde' => 'required|numeric',
            'client_id' => 'required|exists:clients,id',
            'account_type_id' => 'required|exists:account_types,id',
        ]);

        
        $compte = Compte::findOrFail($id);

    
        $compte->solde = $request->input('solde');
        $compte->client_id = $request->input('client_id');
        $compte->account_type_id = $request->input('account_type_id');

        $compte->save();

        return redirect()->route('compte.list')->with('success', 'Compte mis à jour avec succès.');
    }


}
