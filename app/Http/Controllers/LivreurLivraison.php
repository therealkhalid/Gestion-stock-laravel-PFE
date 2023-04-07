<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LivreurLivraison extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=auth()->user()->id;
        $data=DB::select("select livraison.id,livraison.id_livraison,id_commande,livraison.adress,date_livraison from livraison inner join users on livraison.id=users.id and users.id='{$id}' and etat=0");
        return view('Livreurs.ValidLivraison')->with(["data"=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
        // $id=auth()->user()->id;
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id=auth()->user()->id;
        $data=DB::select("SELECT id,id_commande,adress,date_livraison,etat FROM livraison WHERE id='{$id}' and etat=1");
        return view('Livreurs.historique')->with(['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        DB::update("UPDATE livraison SET etat=1 WHERE id_livraison='{$id}'");
        return redirect()->route('livraisons.index');
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
        //
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
