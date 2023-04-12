<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminLivraison extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::select('SELECT livraison.id_livraison,livraison.id_commande,users.name,livraison.adress,livraison.date_livraison,livraison.etat FROM livraison
         INNER JOIN users ON livraison.id=users.id and etat=0');
         return view('admin.livraisonList')->with(['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $livreur=DB::select('select DISTINCT  users.id,name from users where users.role=3');
        // $client=DB::select('SELECT commande.id_commande,name FROM commande INNER JOIN users ON commande.id=users.id WHERE commande.id_commande not IN (
        //     SELECT livraison.id_commande FROM livraison WHERE etat=0
        //     )');
        $client=DB::select("SELECT commande.id_commande,name FROM commande INNER JOIN users
        ON commande.id=users.id where commande.id_commande not in(select livraison.id_commande from livraison )");
        return view('admin.AddLivraison')->with(['livreur'=>$livreur,'client'=>$client]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_commande'=>'required',
            'id'=>'required',
            'adress'=>'required',
            'date_livraison'=>'required',
        ]);
        DB::insert("insert into livraison(id_commande,id,adress,date_livraison,etat)VALUES(?,?,?,?,?)",
        [$request->id_commande,$request->id,$request->adress,$request->date_livraison,false]);
        return redirect()->route('livraison.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data=DB::select('SELECT livraison.id_livraison,livraison.id_commande,users.name,livraison.adress,livraison.date_livraison,livraison.etat FROM livraison
         INNER JOIN users ON livraison.id=users.id where etat=1');
         return view('admin.historiqueLivraison')->with(['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        DB::update("UPDATE livraison SET etat=1 WHERE livraison.id_livraison='{$id}'");
        return redirect()->route('livraison.index');
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
        // $id=auth()->user()->id;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete("DELETE FROM  livraison  WHERE livraison.id_livraison='{$id}'");
        return redirect()->route('livraison.index');
    }
}
