<?php

namespace App\Http\Controllers;

use App\Vente;
use Illuminate\Http\Request;
use App\Redpro;
use App\Article;
use App\Reduction;
use Cart;
use App\Mode;
use App\Details;
use App\Reglement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class VenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Article['Articles']=Article::where('QteStock','>','QteMin')->get();
        $Redpro['Redpros']=Redpro::all();
        $Reduction['Reductions']=Reduction::all();
        $Mode['Modes']=Mode::all();
                $Reglement['Reglements']=Reglement::all();
                $Vente['Ventes']=Vente::where('user_id','=',Auth::user()->id)->get();
                $Vente1['Ventes1']=Vente::where('etat','=',0)->get();

        $Article1['Article1s']=Article::all();
$Cart['Carts']=Cart::content();
        return view('Vente.index',$Redpro,$Article)->with($Article1)->with($Reduction)->with($Cart)->with($Mode)->with($Reglement)->with($Vente)->with($Vente1);
    }


    /**
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function Modifier(Request $request)
    {
     $now= date('Y-m-d');
     $rowId=$request->id;

     request()->validate([
     'art_id'=>['required'],
     'Qte'=>['required'],
     ]);
     $C=Article::findOrFail($request->art_id);

     $reste=$C->QteStock-$request->Qte;
     $cout=Redpro::where('art_id', '=', $request->art_id)
         ->where('dateD', '<=', $now)
        ->where('dateF', '>=', $now)
        ->count();
     $S=Redpro::where('art_id', '=', $request->art_id)
     ->where('dateD', '<=', $now)
     ->where('dateF', '>=', $now)
        ->get();


        if($reste<=$C->QteMin) {
            # code...
            notify()->error('Impossible,a quantité est insuffisante');

                     return redirect()->route('Vente.index');
        }else{
            if ($cout==0) {
              Cart::update($rowId, ['id' => $C->id, 'name' => $C->libart, 'qty' => $request->Qte, 'price' => $C->Pu, 'options' => ['size' => 0]]); // Will update the name

     notify()->success('Enregistrement réussi','Information');
         return redirect()->route('Vente.index');

            }else{
                foreach($S as $Ss)
     {

     $utilisateur = Auth::user()->name;
     }
     $nt=$Ss->taux;
     Cart::update($rowId, ['id' => $C->id, 'name' => $C->libart, 'qty' => $request->Qte, 'price' => $C->Pu, 'options' => ['size' => $nt]]); // Will update the name
     notify()->success('Enregistrement réussi','Information');
         return redirect()->route('Vente.index');

            }


        }


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
     $C=Article::findOrFail($request->art_id);
     $reste=$C->QteStock-$request->Qte;
     $cout=Redpro::where('art_id', '=', $request->art_id)
         ->where('dateD', '<=', $now)
        ->where('dateF', '>=', $now)
        ->count();
     $S=Redpro::where('art_id', '=', $request->art_id)
     ->where('dateD', '<=', $now)
     ->where('dateF', '>=', $now)
        ->get();


        if($reste<$C->QteMin) {
            # code...
            notify()->error('Impossible,la quantité est insuffisante');

                     return redirect()->route('Vente.index');
        }else{
            if ($cout==0) {

              Cart::add(['id' => $C->id, 'name' => $C->libart, 'qty' => $request->Qte, 'price' => $C->Pu, 'options' => ['size' => 0]]);

     notify()->success('Enregistrement réussi','Information');

         return redirect()->route('Vente.index');

            }else{
                foreach($S as $Ss)
     {

     $utilisateur = Auth::user()->name;
     }
     $nt=$Ss->taux;
     Cart::add(['id' => $C->id, 'name' => $C->libart, 'qty' => $request->Qte, 'price' => $C->Pu, 'options' => ['size' => $nt]]);

     notify()->success('Enregistrement réussi','Information');
         return redirect()->route('Vente.index');

            }


        }


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

$nbr= DB::table('ventes')->count();
$n=$nbr+1;
$now= date('Y-m-d');
$user=Auth::user()->id;
$tva=$request->tva;
$ref=$now."_VENTE_N°".$n;
$tt=0;
foreach (Cart::content() as $key => $value) {
  $tt=$tt+($value->qty*$value->price)-($value->qty*$value->price*$value->options->size);

}
$S=Reduction::where('max', '>=', $tt+($tt*$request->tva))
            ->where('min', '<=', $tt+($tt*$request->tva))
             ->where('dateD', '<=', $now)
            ->where('dateF', '>=', $now)
            ->get();


$cout=Reduction::where('max', '>=', $tt+($tt*$request->tva))
            ->where('min', '<=', $tt+($tt*$request->tva))
             ->where('dateD', '<=', $now)
            ->where('dateF', '>=', $now)
            ->count();

            if ($cout==0) {
              # code...
$Ventex = new Vente;

$Ventex->total=$tt+($tt*$request->tva);
$Ventex->reduction=0;
$Ventex->totaltva=$tt*$request->tva;
$Ventex->paye=$tt+($tt*$request->tva);
$newr=$request->donne-($tt+($tt*$request->tva));
              if ($newr>=0) {
                // code...
                $Ventex->etat=1;
              }else {
                $Ventex->etat=0;
              }
              if ($newr<0) {
                // code...
                $Ventex->reste=-$newr;
$newr=-$newr;
              }elseif($newr>0) {
                $Ventex->reste=0;
                $ner=0;

              }elseif($newr==0){
                $Ventex->reste=0;

              }
$Ventex->ref=$ref;
$Ventex->datecr=$now;
$Ventex->tva=$tva;
$Ventex->user_id=$user;
$Ventex->save();
$Rg= new Reglement;
$Rg->donne=$request->donne;
$Rg->montant=$tt+($tt*$request->tva);
if ($request->donne<$tt+($tt*$request->tva)) {
  # code...
$Rst=-($request->donne-($tt+($tt*$request->tva)));
}else{
  $Rst=$request->donne-($tt+($tt*$request->tva));
}
$Rg->reste=$Rst;
$Rg->datecr=$now;
if ($request->donne<=$tt+($tt*$request->tva)) {
  # code...
  $Rg->relicat=0;
}else{
  $Rg->relicat=$Rst;
}
$Rg->vente_id=$Ventex->id;
$Rg->user_id=$user;
$Rg->mode_id=$request->mode_id;
$Rg->save();
            }else{
              foreach($S as $Ss)
              {
                $Ventex = new Vente;

                $Ventex->total=$tt+($tt*$request->tva);
                $Ventex->reduction=$tt*$Ss->taux;
                $Ventex->totaltva=$tt*$request->tva;
                $Ventex->paye=$tt+($tt*$request->tva)-($tt*$Ss->taux);
                $newr=$request->donne-($tt+($tt*$request->tva)-($tt*$Ss->taux));
                              if ($newr>=0) {
                                // code...
                                $Ventex->etat=1;
                              }else {
                                $Ventex->etat=0;
                              }
                              if ($newr<0) {
                                // code...
                                $Ventex->reste=-$newr;
                                $newr=-$newr;
                              }elseif($newr>0) {
                                $Ventex->reste=0;
                                $ner=0;

                              }elseif($newr==0){
                                $Ventex->reste=0;

                              }
                $Ventex->ref=$ref;
                $Ventex->datecr=$now;
                $Ventex->tva=$tva;
                $Ventex->user_id=$user;
                $Ventex->save();
                $Rg= new Reglement;
                $Rg->donne=$request->donne;
                $Rg->montant=$tt+($tt*$request->tva)-($tt*$Ss->taux);
                $Rst=$request->donne-($tt+($tt*$request->tva)-($tt*$Ss->taux));

              if ($request->donne<$tt+($tt*$request->tva)-($tt*$Ss->taux)) {
                # code...
            $Rg->reste=-$Rst;

              }elseif($request->donne>$tt+($tt*$request->tva)-($tt*$Ss->taux)){
                $Rg->reste=0;

              }elseif($request->donne==$tt+($tt*$request->tva)-($tt*$Ss->taux)){
                $Rg->reste=0;
              }

                $Rg->datecr=$now;
                if ($request->donne<=($tt+($tt*$request->tva)-($tt*$Ss->taux))) {
                  # code...
                  $Rg->relicat=0;
                }else{
                  $Rg->relicat=$newr;
                }

                $Rg->vente_id=$Ventex->id;
                $Rg->user_id=$user;
                $Rg->mode_id=$request->mode_id;
                $Rg->save();
              }
            }
foreach (Cart::Content() as $key => $value) {
  # code...
  $C=Article::findOrFail($value->id);

  $Detail = new Details;
$reste=$C->QteStock- $value->qty;

$Detail->total = $value->qty*$value->price;
$Detail->vente_id = $Ventex->id;
$Detail->art_id = $value->id;
$Detail->pu = $value->price;
$Detail->Qte=$value->qty;
$Detail->taux=$value->options->size;
$Detail->totalR=($value->qty*$value->price)-($value->qty*$value->price*$value->options->size);

$Detail->save();
DB::table('articles')
->where('id', $value->id)
->update(['QteStock'=>$reste]);

DB::table('articles')
->where('id',$value->id)
->update(['sortie'=>$C->sortie+$value->qty]);
}

            Cart::destroy();
            return response()->json(['success'=>'Enregistrement réussi','vente'=>$Ventex->id]);

}

    /**
     * Display the specified resource.
     *
     * @param  \App\Vente  $vente
     * @return \Illuminate\Http\Response
     */
    public function show(Vente $vente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vente  $vente
     * @return \Illuminate\Http\Response
     */
    public function edit(Vente $vente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vente  $vente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vente $vente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vente  $vente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vente $vente)
    {
        //
    }
}
