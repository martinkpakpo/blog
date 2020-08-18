<?php

namespace App\Http\Controllers;

use App\Details;
use Illuminate\Http\Request;
use Cart;

class DetailsController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Details  $details
     * @return \Illuminate\Http\Response
     */
    public function show(Details $details)
    {
        //
    }
    /**
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function Ajouter(Request $request)
   {
     $now= date('Y-m-d');

     request()->validate([
     'art_id'=>['required'],
     'Qte'=>['required'],
     ]);
     $cout=Redpro::where('art_id', '=', $request->art_id)
         ->where('dateD', '<=', $now)
        ->where('dateF', '>=', $now)
        ->count();
     $S=Redpro::where('art_id', '=', $request->art_id)
     ->where('dateD', '<=', $now)
     ->where('dateF', '>=', $now)
        ->get();
                  $C=Article::findOrFail($request->art_id);
                  $reste=$C->QteStock-$request->Qte;

        if ($reste<=$C->QteMin) {
            # code...
            notify()->error('Impossible,a quantité est insuffisante');

                     return redirect()->route('Vente.index');
        }else{
            if ($cout==0) {



     Cart::add(['id' => $C->id, 'name' => $C->libelle, 'qty' => $request->Qte, 'price' => $C->Pu, 'weight' => 0 ,'options' => ['total' => $request->Qte*$C->Pu],['totalR' => $request->Qte*$C->Pu]]);

     DB::table('articles')
     ->where('id', $request->idArticle)
     ->update(['QteStock'=>$reste]);

     DB::table('articles')
     ->where('id', $request->idArticle)
     ->update(['sortie'=>$C->sortie+$request->Qte]);
     flash('Enregistrement réussi')->success();

         return redirect()->route('Vente.index');

            }else{
                foreach($S as $Ss)
     {

     $utilisateur = Auth::user()->name;
     }

     Cart::add(['id' => $C->id, 'name' => $C->libelle, 'qty' => $request->Qte, 'price' => $C->Pu, 'weight' => $nt, 'options' => ['total' => $request->Qte*$C->Pu],['totalR' => $request->Qte*$C->Pu-($r)]]);
     DB::table('articles')
     ->where('id', $request->idArticle)
     ->update(['QteStock'=>$reste]);

     DB::table('articles')
     ->where('id', $request->idArticle)
     ->update(['sortie'=>$C->sortie+$request->Qte]);
     flash('Enregistrement réussi')->success();
         return redirect()->route('Vente.index');

            }


        }
















                       $Ag=Produit::findorfail($request->produit_id);

   Cart::add([
   ['id' => $request->produit_id, 'name' => $Ag->libelle, 'qty' => $request->Qte, 'price' => 0],
   ]);
   Alert::toast('Produit ajouté avec succès','success');

                     return redirect()->route('Service.index');

   }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Details  $details
     * @return \Illuminate\Http\Response
     */
    public function edit(Details $details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Details  $details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Details $details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Details  $details
     * @return \Illuminate\Http\Response
     */
    public function destroy(Details $details)
    {
        //
    }
}
