<?php

namespace App\Http\Controllers;

use App\Redpro;
use Illuminate\Http\Request;
use App\Article;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class RedproController extends Controller
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
          $this->validate($request,['libelle'=>['required', 'string', 'min:4', 'unique:redpros'],]);
               $now= date('Y-m-d');
               if (($now>$request->dateD)||($now>$request->dateF)) {
                   notify()->error('Impossible, vous ne pouvez pas programmé de promo sur des dates antérieure');

                       return redirect()->route('Vente.index');
                      }else{
                       if ($request->dateF<$request->dateD) {
                   notify()->error('Impossible, La date de fin ne peut etre antérieure à la date de debut');

                       return redirect()->route('Vente.index');
                                   }else{
                               $ver= DB::table('redpros')
                               ->where([
                                   ['redpros.dateD','<=',$request->dateD],
                                   ['redpros.dateF','>=',$request->dateF],
                                   ['redpros.art_id','=',$request->art_id],
                               ])->count();

                               $vere= DB::table('redpros')
                               ->where([
                                   ['redpros.dateD','<=',$request->dateD],
                                   ['redpros.dateF','>=',$request->dateD],
                                   ['redpros.art_id','=',$request->art_id],
                               ])->count();

                               $vere1= DB::table('redpros')
                               ->where([
                                   ['redpros.dateD','<=',$request->dateF],
                                   ['redpros.dateF','>=',$request->dateF],
                                   ['redpros.art_id','=',$request->art_id],
                               ])->count();
                                   if ($ver==0) {
                                       # code...                 'libelle','dateD','dateF','min','max','taux',

                                       if ($vere==0) {
                                         // code...
                                         if ($vere1==0) {
                                           // code...
                                           $Reduction = new Redpro;
                                              $Reduction->libelle = $request->libelle;
                                              $Reduction->dateD = $request->dateD;
                                              $Reduction->dateF = $request->dateF;
                                              $Reduction->art_id = $request->art_id;
                                              $Reduction->taux = $request->taux/100;
                                              $Reduction->save();
                                              notify()->success('Enregistrement réussi');

                                                  return redirect()->route('Vente.index');


                                         }else{
                notify()->error('Impossible, cette réduction ne peut etre passé car une réduction est en cours à ces dates sur ce produit');

                                 return redirect()->route('Vente.index');
                                         }
                                       }else{
                                         notify()->error('Impossible, cette réduction ne peut etre passé car une réduction est en cours à ces dates sur ce produit');

                               return redirect()->route('Vente.index');
                                       }


                                   }else{
          notify()->error('Impossible, cette réduction ne peut etre passé');

                           return redirect()->route('Vente.index');
                                   }
                           }
                      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Redpro  $redpro
     * @return \Illuminate\Http\Response
     */
    public function show(Redpro $redpro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Redpro  $redpro
     * @return \Illuminate\Http\Response
     */
    public function edit(Redpro $redpro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Redpro  $redpro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Redpro $redpro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Redpro  $redpro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Redpro $redpro)
    {
        //
    }
}
