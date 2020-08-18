<?php

namespace App\Http\Controllers;

use App\Reglement;
use App\Vente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class ReglementController extends Controller
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
        //
        $now= date('Y-m-d');
        $user = Auth::user()->id;
        $Vt=Vente::findOrFail($request->vente_id);

        if ($request->donne<$request->montant) {
          // code...

          return response()->json(['success'=>'Veuillez vérifier les sommes','vente'=>$Vt->id]);
        }else {
          // code...
        if ($Vt->reste!=0) {
            $Rg= new Reglement;
            $Rg->vente_id=$request->vente_id;

            $Rst=$request->donne-$request->montant;

    if ($request->montant==$Vt->reste) {
      // code...
      $Rst=0;
      $Vt->reste=0;
      $Rg->reste=0;
      $Rg->donne=$request->donne;
      $Rg->montant=$request->montant;
      $Rg->relicat=0;
      $Vt->etat=1;
    }elseif($request->montant>$Vt->reste) {
      // code...
      $Rst=0;
      $Vt->reste=0;
      $Rg->reste=0;
      $Rg->donne=$request->donne;
      $Rg->montant=$Vt->reste;
      $Rg->relicat=$request->donne-$Vt->reste;
      $Vt->etat=1;
    }elseif($request->montant<$Vt->reste) {
      // code...
      $Rst=0;
      $Vt->reste=$Vt->reste-$request->montant;
      $Rg->reste=$Vt->reste-$request->montant;
      $Rg->donne=$request->donne;
      $Rg->montant=$request->montant;
      $Rg->relicat=$request->donne-$request->montant;
    }
            $Rg->datecr=$now;
            $Rg->user_id=$user;
            $Rg->mode_id=$request->mode_id;
            $Rg->save();
            $Vt->save();

            return response()->json(['success'=>'Reglement enregistré','vente'=>$Vt->id]);

        }else {
          // code...
          return response()->json(['success'=>'Vente déjà réglée','vente'=>$Vt->id]);

        }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reglement  $reglement
     * @return \Illuminate\Http\Response
     */
    public function show(Reglement $reglement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reglement  $reglement
     * @return \Illuminate\Http\Response
     */
    public function edit(Reglement $reglement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reglement  $reglement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reglement $reglement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reglement  $reglement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reglement $reglement)
    {
        //
    }
}
