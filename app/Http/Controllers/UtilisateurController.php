<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Utilisateur;

use App\User;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $User['Users']=User::all();

        return view('User.index',$User); 
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

        request()->validate([
            'name' => ['required', 'string', 'max:255','unique:users'],
           'email' => ['required', 'string', 'max:255', 'unique:users'],
           'password' => ['required', 'string', 'min:6', 'confirmed'],


]);

       $User = new User;

       $User->name = $request->name;
       $User->email = $request->email;
       $User->password = Hash::make($request->password);
       $User->etat = $request->etat;
       $User->connect = 1;

       $User->save();

       notify()->success('Enregistrement réussi','Information');
       return redirect()->route('User.index');
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function show(Utilisateur $utilisateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function edit(Utilisateur $utilisateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Utilisateur $utilisateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Utilisateur $utilisateur)
    {
        //
    }
}
