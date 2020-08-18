<?php

namespace App\Http\Controllers;

use App\Reduction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class ReductionController extends Controller
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
        request()->validate([
            'libelle'=>['required', 'string', 'min:4', 'unique:reductions'],]);
                             $now= date('Y-m-d');

            if (($now>$request->dateD)||($now>$request->dateF)) {
                  notify()->error('Impossible, vous ne pouvez pas programmé de promo sur des dates antérieure');
                return redirect()->route('Vente.index');
                   }else{
                    if ($request->dateF<$request->dateD) {
                  notify()->error('Impossible, La date de fin ne peut etre antérieure à la date de debut');

                return redirect()->route('Vente.index');
                                }else{
                            $ver= DB::table('reductions')
                            ->where([
                                ['reductions.dateD','<=',$request->dateD],
                                ['reductions.dateF','>=',$request->dateF],
                                ['reductions.min','<=',$request->min],
                                ['reductions.max','>=', $request->min],
                            ])->count();
                            $ver1= DB::table('reductions')
                            ->where([
                                ['reductions.dateD','<=',$request->dateD],
                                ['reductions.dateF','>=',$request->dateF],
                                ['reductions.min','<=',$request->max],
                                ['reductions.max','>=', $request->max],
                            ])->count();

                                if (($ver==0)&&($ver1==0)) {
                                    # code...                 'libelle','dateD','dateF','min','max','taux',
            if($request->min>=$request->max){
                  notify()->error('Impossible, la valeur minimale dépasse la valeur maximale');

                   return redirect()->route('Vente.index');
            }else{
                 $Reduction = new Reduction;
                    $Reduction->libelle = $request->libelle;
                    $Reduction->dateD = $request->dateD;
                    $Reduction->dateF = $request->dateF;
                    $Reduction->min = $request->min;
                    $Reduction->max = $request->max;
                    $Reduction->taux = $request->taux/100;
                    $Reduction->save();
                    notify()->success('Enregistrement réussi','Information');
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
     * @param  \App\Reduction  $reduction
     * @return \Illuminate\Http\Response
     */
    public function show(Reduction $reduction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reduction  $reduction
     * @return \Illuminate\Http\Response
     */
    public function edit(Reduction $reduction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reduction  $reduction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reduction $reduction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reduction  $reduction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reduction $reduction)
    {
        //
    }
}
