<?php

namespace App\Http\Controllers;

use App\Mode;
use Illuminate\Http\Request;

class ModeController extends Controller
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
        $this->validate($request,['libelle' => 'string|required|unique:modes|max:190|min:2',]);
        $Categorie = new Mode;
       $Categorie->libelle = $request->libelle;
       $Categorie->save();

       notify()->success('Enregistrement réussi');
       return redirect()->route('Information.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mode  $mode
     * @return \Illuminate\Http\Response
     */
    public function show(Mode $mode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mode  $mode
     * @return \Illuminate\Http\Response
     */
    public function edit(Mode $mode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mode  $mode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        $this->validate($request,['libelle' => 'string|required|unique:modes|max:190|min:2',]);
        $Categorie = Mode::findOrFail($request->id);
       $Categorie->libelle = $request->libelle;
       $Categorie->save();

       notify()->success('Modification réussie');
       return redirect()->route('Information.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mode  $mode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      //
    //  $nbr= DB::table('produits')->where('cat_id','=',$request->id)->count();
  dd($request);
        //
    }
}
