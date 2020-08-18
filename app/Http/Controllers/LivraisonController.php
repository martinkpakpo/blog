<?php

namespace App\Http\Controllers;

use App\Livraison;
use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Cart;
class LivraisonController extends Controller
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
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function Modifier(Request $request)
    {
      $rowId=$request->id;
      $C=Article::findOrFail($request->art_id);
              Cart::update($rowId, ['id' => $C->id, 'name' => $C->libart, 'qty' => $request->Qte, 'price' => $C->Pu, 'options' => ['size' => 0]]); // Will update the name

     notify()->success('Modification réussi','Information');

         return redirect()->route('Stock');


    }




    /**
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function Ajouter(Request $request)
    {
      $C=Article::findOrFail($request->art_id);

              Cart::add(['id' => $request->art_id, 'name' => $C->libart, 'qty' => $request->Qte, 'price' => $C->Pu, 'options' => ['size' => 0]]);

     notify()->success('Enregistrement réussi','Information');

         return redirect()->route('Stock');


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




foreach (Cart::content() as $key => $Cart) {
  // code...
  $Livraison = new Livraison;
  $now= date('Y-m-d');

$A=Article::findOrFail($Cart->id);
$qtef=$Cart->qty+$A->QteStock;
$Livraison->Qte = $Cart->qty;
  $Livraison->dateCr = $now;
  $Livraison->art_id=$Cart->id;
  $Livraison->frs_id=$request->frs_id;
  $Livraison->save();
DB::table('articles')
->where('id', $Cart->id)
->update(['QteStock'=>$qtef]);
$entree=$Cart->qty+$A->entree;
DB::table('articles')
->where('id', $Cart->id)
->update(['entree'=>$entree]);
}
Cart::destroy();
notify()->success('Enregistrement réussi');
return redirect()->route('Stock');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Livraison  $livraison
     * @return \Illuminate\Http\Response
     */
    public function show(Livraison $livraison)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Livraison  $livraison
     * @return \Illuminate\Http\Response
     */
    public function edit(Livraison $livraison)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Livraison  $livraison
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Livraison $livraison)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Livraison  $livraison
     * @return \Illuminate\Http\Response
     */
    public function destroy(Livraison $livraison)
    {
        //
    }
}
