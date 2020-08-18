<?php

namespace App\Http\Controllers;
use App\Info;
use Illuminate\Http\Request;
use App\Mode;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Categorie['Categories']=Mode::all();

        $Info['Infos']=Info::all();
return view('Information.index',$Info,$Categorie);
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

$ver= DB::table('infos')->count();
if ($ver==0) {
  // code...
  $this->validate($request,['libelle' => 'string|required|max:190|min:2',]);
  $this->validate($request,['numero' => 'string|required|max:190|min:2',]);

  $Categorie = new Info;
  $Categorie->libelle = $request->libelle;
  $Categorie->numero = $request->numero;
  $Categorie->adresse = $request->adresse;
  $Categorie->mail = $request->mail;
  $Categorie->save();
  notify()->success('Enregistrement réussi');
  return redirect()->route('Information.index');
}else {
  notify()->error('Requète échouée');
  return redirect()->route('Information.index');
}

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $this->validate($request,['libelle' => 'string|required|max:190|min:2',]);
        $this->validate($request,['numero' => 'string|required|max:190|min:2',]);

        $Categorie = Info::findOrFail($request->id);
        $Categorie->libelle = $request->libelle;
        $Categorie->numero = $request->numero;
        $Categorie->adresse = $request->adresse;
        $Categorie->mail = $request->mail;
        $Categorie->save();

        notify()->success('Modification réussie');
       return redirect()->route('Information.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
