<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class ClientCommand extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clients.addCommande');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.addCommande');

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
            'quantite'=>'required',
        ]);
        $id=auth()->user()->id;
        $quantite=$request->quantite;
        $total=1*$quantite;
        $date_sys=now()->format('Y-m-d');
        DB::insert("insert into commande(id,quantite,prix_commande,date_commande)VALUES(?,?,?,?)",[$id,$quantite,$total,$date_sys]);
        return redirect()->route('commande.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id=auth()->user()->id;
        $data=DB::select("SELECT users.id,id_commande,quantite,commande.prix_commande,commande.date_commande,name FROM commande
         INNER JOIN users ON commande.id=users.id WHERE commande.id='{$id}'AND commande.id_commande NOT IN(SELECT livraison.id_commande FROM livraison)");
         return view('clients.listeCommande')->with(["data"=>$data]);
        
    }
    public function HistoriQueCommande()
    {
        $id=auth()->user()->id;
        $data=DB::select("SELECT users.id,id_commande,quantite,commande.prix_commande,commande.date_commande,name FROM commande
         INNER JOIN users ON commande.id=users.id WHERE commande.id='{$id}'AND commande.id_commande  IN(SELECT livraison.id_commande FROM livraison WHERE etat=1)");
         return view('clients.HistoriqueCommande')->with(["data"=>$data]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id2=auth()->user()->id;
        $data=DB::select("SELECT users.id,id_commande,quantite FROM commande
         INNER JOIN users ON commande.id=users.id WHERE commande.id='{$id2}' and id_commande='{$id}'");
         return view('clients.EditCommande')->with(["data"=>$data]);
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
            'quantite'=>'required',
        ]);
        $prix=1*$request->quantite;
        DB::update("UPDATE commande set quantite=?, prix_commande=? where id_commande='{$id}'",[$request->quantite,$prix]);
        return redirect()->route('home.client')->with([
            "success"=>"Commande updated successfuly"
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
        DB::delete("DELETE FROM commande where id_commande='{$id}'");
        return redirect()->route('home.client')->with([
            'sucess'=>'Commande deleted successfuly'
        ]);
    }
}
