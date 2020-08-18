<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;
use App\Produit;
use App\Article;
use App\Fournisseur;
use App\Livraison;
use App\Info;
use Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Article['Articles']=Article::all();
        $Categorie['Categories']=Categorie::all();
        $Produit['Produits']=Produit::all();
        $Fournisseur['Fournisseurs']=Fournisseur::all();
        $Livraison['Livraisons']=Livraison::all();
        $Info['Infos']=Info::all();
        $Cart['Carts']=Cart::content();

        return view('Stock.index',$Categorie,$Produit)->with($Article)->with($Cart)->with($Fournisseur)->with($Livraison)->with($Info);
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
        $this->validate($request,['libcat' => 'string|required|unique:categories|max:190|min:2',]);
        $Categorie = new Categorie;
       $Categorie->libcat = $request->libcat;
       $Categorie->save();

       notify()->success('Enregistrement réussi');
       return redirect()->route('Stock');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        $this->validate($request,['libcat' => 'string|required|unique:categories|max:190|min:2',]);
        $Categorie =Categorie::findOrFail($request->id);
       $Categorie->libcat = $request->libcat;
       $Categorie->save();

       notify()->success('Modification réussie');
       return redirect()->route('Stock');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
      $nbr= DB::table('articles')->where('cat_id','=',$request->id)->count();
      if ($nbr==0) {
        $Categorie =Categorie::findOrFail($request->id);
        $Categorie->delete();
        notify()->success('Suppression réussie','SUCCES');
        return redirect()->route('Stock');
      }else {
        notify()->error('Suppression impossible','ERREUR');
        return redirect()->route('Stock');
            }

    }
}
