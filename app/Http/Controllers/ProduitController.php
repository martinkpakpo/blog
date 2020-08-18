<?php

namespace App\Http\Controllers;

use App\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
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
        $this->validate($request,['libpro' => 'string|required|unique:produits|max:190|min:2',]);
        $Produit = new Produit;
       $Produit->libpro = $request->libpro;
       $Produit->cat_id = $request->cat_id;
       $Produit->save();

       notify()->success('Enregistrement réussi');
       return redirect()->route('Stock');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $this->validate($request,['libpro' => 'string|required|unique:produits|max:190|min:2',]);
        $Produit =Produit::findOrFail($request->id);
       $Produit->libpro = $request->libpro;
       $Produit->cat_id=$request->cat_id;
       $Produit->save();

       notify()->success('Modification réussie');
       return redirect()->route('Stock');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit)
    {
        //
      $nbr= DB::table('articles')->where('pro_id','=',$request->id)->count();

        if ($nbr==0) {
          $Produit =Produit::findOrFail($request->id);
          $Produit->delete();
          notify()->success('Suppression réussie','SUCCES');
          return redirect()->route('Stock');
        }else {
          notify()->error('Suppression impossible','ERREUR');
          return redirect()->route('Stock');
              }
    }
}
