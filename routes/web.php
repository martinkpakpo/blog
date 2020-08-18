<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Article;
use App\Vente;
use App\Details;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
Route::get('/', function () {
    return view('auth.login');
});
Route::post('/Vente/Ajouter', 'VenteController@Ajouter')->name('addCart')->middleware('auth');
Route::put('/Vente/Modifier', 'VenteController@Modifier')->name('ModifierCart')->middleware('auth');

Auth::routes();
Route::Resource('/Details', 'DetailsController')->middleware('auth');

Route::Resource('/Statistique', 'StatistiqueController')->middleware('auth');


Route::get('/Retirer/Mode/{id}', function () {
  $nbr=DB::table('reglements')->where('mode_id','=',request('id'))->count();
  if ($nbr==0) {
  DB::table('modes')->where('id', '=', request('id'))->delete();
    notify()->success('Suppression réussi','Information');
        return redirect()->route('Information.index');
  }else{
    notify()->error('Ce mode de reglement est en cours d"utilisation','Information');
    return redirect()->route('Information.index');   
  }

})->middleware('auth');

Route::get('/Retirer/Livraison/{id}', function () {

    Cart::remove(request('id'));


    notify()->success('Suppression réussi','Information');

                          return redirect()->route('Stock');


})->middleware('auth');

Route::get('/Retirer/all', function () {

    Cart::destroy();
    notify()->success('Opération annulé avec succes','Information');

  return redirect()->route('Stock');

})->middleware('auth');
Route::get('/Retirer/vente', function () {

    Cart::destroy();
  return redirect()->route('Vente.index');

})->middleware('auth');

Route::get('/Retirer/{id}', function () {

    Cart::remove(request('id'));


    notify()->success('Suppression réussi','Information');

                          return redirect()->route('Vente.index');


})->middleware('auth');
Route::Resource('/Mode', 'ModeController')->middleware('auth');

Route::Resource('/Information', 'InfoController')->middleware('auth');
Route::Resource('/Vente', 'VenteController')->middleware('auth');
Route::Resource('/Redpro', 'RedproController')->middleware('auth');
Route::Resource('/Reduction', 'ReductionController')->middleware('auth');
Route::post('/Regstore', 'ReglementController@store')->name('Regstore')->middleware('auth');
Route::post('/addVentes', 'VenteController@store')->name('addVentes')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Stock', 'CategorieController@index')->name('Stock')->middleware('auth');
Route::post('/addCat', 'CategorieController@store')->name('addCat')->middleware('auth');
Route::put('/editCat', 'CategorieController@update')->name('editCat')->middleware('auth');
Route::put('/deleteCat', 'CategorieController@destroy')->name('deleteCat')->middleware('auth');
Route::post('/addpro', 'ProduitController@store')->name('addpro')->middleware('auth');
Route::put('/editpro', 'ProduitController@update')->name('editpro')->middleware('auth');
Route::put('/deletepro', 'ProduitController@destroy')->name('deletepro')->middleware('auth');
Route::post('/addart', 'ArticleController@store')->name('addart')->middleware('auth');
Route::put('/editart', 'ArticleController@update')->name('editart')->middleware('auth');
Route::put('/deleteart', 'ArticleController@destroy')->name('deletepro')->middleware('auth');
Route::post('/addFrs', 'FournisseurController@store')->name('addFrs')->middleware('auth');
Route::put('/editFrs', 'FournisseurController@update')->name('editFrs')->middleware('auth');
Route::post('/addLiv', 'LivraisonController@store')->name('addLiv')->middleware('auth');
Route::post('/addLigne', 'LivraisonController@Ajouter')->name('addLigne')->middleware('auth');
Route::put('/dropLigne', 'LivraisonController@Modifier')->name('dropLigne')->middleware('auth');
Route::Resource('/User', 'UtilisateurController')->middleware('auth');

Route::get('/Inventaire', function () {
  $Article['Articles']=Article::all();
    return view('Stock.inventaire',$Article);
})->middleware('auth');



Route::get('/Registre/destroy/{id}', function () {
  DB::table('users')->where('id', '=', request('id'))->update(['connect' => 0]);
      return redirect()->route('User.index');

})->middleware('App\Http\Middleware\Authenticate');

Route::get('/Voir/{id}', function () {
 $Info['Infos']=DB::table('infos')->get();
 $Vente['Ventes']=Vente::where('id', '=', request('id'))->get();
 $Detail['Details']=Details::where('vente_id', '=', request('id'))->get();

 return view('Vente.recu',$Detail,$Vente)->with($Info);

})->middleware('App\Http\Middleware\Authenticate');



Route::get('/Registre/active/{id}', function () {

  DB::table('users')->where('id', '=', request('id'))->update(['connect' => 1]);
      return redirect()->route('User.index');

})->middleware('App\Http\Middleware\Authenticate');

Route::get('/Registre/nommer/{id}', function () {

  DB::table('users')->where('id', '=', request('id'))->update(['etat' => 0]);
      return redirect()->route('User.index');

})->middleware('App\Http\Middleware\Authenticate');
