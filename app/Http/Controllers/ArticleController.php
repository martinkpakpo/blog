<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ArticleController extends Controller
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
      $this->validate($request,['libart' => 'string|required|unique:articles|max:190|min:2',]);
      if($request->Pu<=$request->montantmax){
        notify()->error('Erreur de saisie');
        return redirect()->route('Stock');
      }else{
        $Article = new Article;
        $Article->libart = $request->libart;
        $Article->cat_id = $request->cat_id;
        $Article->QteMin=$request->QteMin;
        $Article->Pu=$request->Pu;
        $Article->entree=0;
        $Article->sortie=0;
        $Article->QteStock=0;
        $Article->reductible=$request->reductible;
        $Article->Qtered=$request->Qtered;
        $Article->montantmax=$request->montantmax;
        $Article->save();
        notify()->success('Enregistrement réussi');
        return redirect()->route('Stock');
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $this->validate($request,['libart' => 'string|required|max:190|min:2',]);
      if($request->Pu<=$request->montantmax){
        notify()->error('Erreur de saisie');
        return redirect()->route('Stock');
      }else{
        $Article =Article::findOrFail($request->id);
        $Article->libart = $request->libart;
        $Article->QteMin=$request->QteMin;
        $Article->Pu=$request->Pu;
        $Article->reductible=$request->reductible;
        $Article->Qtered=$request->Qtered;
        $Article->montantmax=$request->montantmax;
        $Article->save();
        notify()->success('Modification réussie');
        return redirect()->route('Stock');
      }


  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
