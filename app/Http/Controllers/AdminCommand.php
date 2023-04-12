<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCommand extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
    public function index()
    {
            // $client=DB::select('select DISTINCT  users.id,name from users,commande where users.id=commande.id ');
            // $commandes=DB::select("select id_commande,name,adress,telephone,quantite,prix_commande,date_commande from commande inner join users on commande.id=users.id ");
            // return view('admin.showCommand')->with(["commandes"=>$commandes,"client"=>$client]);

            //  $commandes=DB::select("select id_commande,name,adress,telephone,quantite,prix_commande,date_commande from commande 
            //  inner join users on commande.id=users.id ");
             $commandes=DB::select("select commande.id_commande,name,users.adress,telephone,quantite,prix_commande,date_commande,etat from commande 
             inner join users on commande.id=users.id INNER JOIN livraison ON commande.id_commande=livraison.id_commande WHERE etat=1");
             return view('admin.HistoriqueCommand')->with(["commandes"=>$commandes]);
    
        
        }
        
        public function show()
        {
            $commandes=DB::select("select commande.id_commande,name,users.adress,telephone,quantite,prix_commande,date_commande from commande
             inner join users on commande.id=users.id where commande.id_commande not in(select livraison.id_commande from livraison )");
            return view('admin.ShowCommande')->with(["commandes"=>$commandes]);
        }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
