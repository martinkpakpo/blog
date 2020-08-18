<?php

namespace App\Http\Controllers;

use App\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,['nom' => 'string|required|unique:fournisseurs|max:190|min:2',]);
      $this->validate($request,['tel' => 'string|required|unique:fournisseurs|max:190|min:2',]);
      $this->validate($request,['rep' => 'string|unique:fournisseurs|max:190|min:2',]);

      $Fournisseur = new Fournisseur;
     $Fournisseur->nom = $request->nom;
     $Fournisseur->tel = $request->tel;
     $Fournisseur->rep = $request->rep;
     $Fournisseur->save();
     notify()->success('Enregistrement réussi');
     return redirect()->route('Stock');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function show(Fournisseur $fournisseur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function edit(Fournisseur $fournisseur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $this->validate($request,['nom' => 'string|required|unique:fournisseurs|max:190|min:2',]);
        $this->validate($request,['tel' => 'string|required|unique:fournisseurs|max:190|min:2',]);
        $this->validate($request,['rep' => 'string|unique:fournisseurs|max:190|min:2',]);
      $Fournisseur = Fournisseur::findOrFail($request->id);
       $Fournisseur->nom = $request->nom;
       $Fournisseur->tel = $request->tel;
       $Fournisseur->rep = $request->rep;
       $Fournisseur->save();
       notify()->success('Enregistrement réussi');
       return redirect()->route('Stock');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fournisseur $fournisseur)
    {
        //
    }
}
