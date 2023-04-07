<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileFournisseur extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=auth()->user()->id;
        $data=DB::select("SELECT id,name,adress,role,email,telephone from users where users.id='{$id}'");
        return view('Fournisseurs.Profile')->with(["data"=>$data]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=DB::select("SELECT id,name,adress,role,email,telephone from users where users.id='{$id}'");
        return view('Fournisseurs.ShowProfile')->with(["data"=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=DB::select("SELECT id,name,adress,role,email,telephone from users where users.id='{$id}'");
        return view('Fournisseurs.editProfile')->with(["data"=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'adress' => 'required',
            'telephone' => 'required',
        ]);

        
        DB::update("update users set name=?,email=?,role=?,adress=?,telephone=? where id='{$id}'",[$request->name,$request->email,$request->role,$request->adress,$request->telephone]);
        return redirect()->route('profile_fournisseur.index')->with([
            'sucess'=>'Client updated successfuly'
        ]);
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
