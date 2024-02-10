<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AfficherClient()
    {
        $clients = Client::all();
        return View('client.list',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'date_naissance' => 'nullable'
        ]);
       
        $client  = new Client();
        $client->nom = $request->input('nom');
        $client->prenom = $request->input('prenom');
        $client->adresse = $request->input('adresse');
        $client->date_naissance = $request->date_naissance;
        $client->CNI = $request->input('CNI');
        $client->save();
        return redirect()->route('client.list')->with('succes','Client ajouter');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public  function  delete(int $id)
    {
       $client = Client::find($id);
       $client->delete();
       return redirect()->back()->with('success','client supprimer');
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public  function  edit(int $id)
    {
        $client = Client::find($id);
        return  view('client.edit',compact('client'));
       // return redirect()->back()->with('success','client supprimer');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public  function  update(Request $request, int $id)
    {
        $client = Client::find($id);
        $client->nom = $request->input('nom');
        $client->prenom = $request->input('prenom');
        $client->adresse = $request->input('adresse');
        $client->date_naissance = $request->date_naissance;
        $client->CNI = $request->input('CNI');
        $client->update();

        return redirect()->route('client.list')->with('success','client modifier');

   
}
}