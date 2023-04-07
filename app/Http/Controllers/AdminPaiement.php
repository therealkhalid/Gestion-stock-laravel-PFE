<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPaiement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::select('SELECT totalprixpayments.id,totalprixcommande.id,totalprixcommande.name,totalprixcommande.adress,
        totalprixcommande.telephone,totalprixcommande.prixCommande,totalprixpayments.prixPaiement FROM
         totalprixcommande INNER JOIN totalprixpayments ON totalprixcommande.id=totalprixpayments.id ');
        
        return view('admin.PaymentList')->with(['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client=DB::select('select DISTINCT  users.id,name from users where users.role=1');
        return view('admin.AddPaiments')->with(['client'=>$client]);
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
            'id'=>'required',
            'prix_paiement'=>'required',
            'date_paiement'=>'required',
        ]);
        DB::insert("insert into paiment(id,prix_paiement,date_paiement)VALUES(?,?,?)",[$request->id,$request->prix_paiement,$request->date_paiement]);
        return redirect()->route('paiement.index');
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
        DB::delete("DELETE from paiment where id='{$id}'");
        return redirect()->route('paiement.index')->with([
            'sucess'=>'Paiement deleted successfuly'
        ]);
    }
}
