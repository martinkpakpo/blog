<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Article;
use App\Produit;
use App\Fournisseur;
use App\Livraison;
use App\Reduction;
use App\Reglement;
use App\Vente;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::count();
        $Categorie = Categorie::count();
        $Article = Article::count();
        $Produit = Reglement::count();
        $Fournisseur = Fournisseur::count();
        $vente = vente::count();
        $Reduction = Reduction::count();
        $Livraison = Livraison::count();
        $Ventex['V']=Vente::OrderBy('id','desc')->get();
                return view('home',[
            'user'=>$user,
            'Categorie'=>$Categorie,
            'Article'=>$Article,
            'Produit'=>$Produit,
            'Fournisseur'=>$Fournisseur,
            'vente'=>$vente,
            'Reduction'=>$Reduction,
            'Livraison'=>$Livraison,
            ],$Ventex);
                }
}
