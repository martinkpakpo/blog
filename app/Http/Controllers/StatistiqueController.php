<?php

namespace App\Http\Controllers;

use App\Statistique;
use App\Vente;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
class StatistiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('articles')
      ->select(
       DB::raw('articles.libart as libelle'),
       DB::raw('articles.QteStock as stock'),
       DB::raw('articles.sortie as sortie'),
       DB::raw('articles.id as id'),

       DB::raw('articles.entree as entree'))
      ->groupBy('id')
      ->get();
    $array[] = ['libelle','entree','stock', 'sortie'];
    foreach($data as $key => $value)
    {
     $array[++$key] = [$value->libelle,$value->entree, $value->stock,$value->sortie];
    }
    return view('Statistique.index')->with('gender', json_encode($array));

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
        $Info['Infos']=DB::table('infos')->get();

        if($request->input('date1')&&$request->input('date2'))
        {
                if ($request->input('date1')<=$request->input('date2')) {
                    # code...
    $Vente['Ventes']=Vente::whereBetween('datecr',[$request->input('date1'),$request->input('date2')])->get();

    $chart_data1['chart_datas1']= DB::table('details')
    ->join('ventes', 'ventes.id', '=', 'details.vente_id')
    ->join('articles', 'articles.id', '=', 'details.art_id')
    ->select(
     DB::raw('sum(details.Qte) as Qte'),
     DB::raw('articles.libart as lib')

     )
    ->whereBetween('ventes.datecr',[$request->input('date1'),$request->input('date2')])
    ->groupBy('articles.id')
    ->get();
$date1=$request->input('date1');
$date2=$request->input('date2');

        return view('Statistique.requete',[
            'date1'=>$date1,
            'date2'=>$date2,
                    ],$Vente)->with($Info)->with($chart_data1);   
                }elseif ($request->input('date1')>=$request->input('date2')) {
                    $Vente['Ventes']=Vente::whereBetween('datecr',[$request->input('date2'),$request->input('date1')])->get();

                
                    $chart_data1['chart_datas1']= DB::table('details')
                    ->join('ventes', 'ventes.id', '=', 'details.vente_id')
                    ->join('articles', 'articles.id', '=', 'details.art_id')
                    ->select(
                     DB::raw('sum(details.Qte) as Qte'),
                     DB::raw('articles.libart as lib')
                
                     )
                    ->whereBetween('ventes.datecr',[$request->input('date2'),$request->input('date1')])
                    ->groupBy('articles.id')
                    ->get();
                    $date1=$request->input('date2');
                    $date2=$request->input('date1');
                    
                            return view('Statistique.requete',[
                                'date1'=>$date1,
                                'date2'=>$date2,
                                        ],$Vente)->with($Info)->with($chart_data1);   
                }
   
        }else{
        alert()->error('Erreur','Veuillez renseigner les parametres de recherche');
                              return redirect()->route('Statistique.index');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Statistique  $statistique
     * @return \Illuminate\Http\Response
     */
    public function show(Statistique $statistique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Statistique  $statistique
     * @return \Illuminate\Http\Response
     */
    public function edit(Statistique $statistique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Statistique  $statistique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statistique $statistique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Statistique  $statistique
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statistique $statistique)
    {
        //
    }
}
