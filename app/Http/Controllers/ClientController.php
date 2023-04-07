<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $clients=DB::select("select id,name,email,role,adress,telephone from users where role='1'");
        return view('clients.index')->with(['client'=>$clients]); 
    }
    public function afficher()
    {
        $id=auth()->user()->id;
        $nbrCommande=DB::select("select count(*) as '' from commande where commande.id='{$id}'");
        $commande=json_encode($nbrCommande);
        $commande2=str_replace (array('[', ']','{','}',':'), " " ,$commande);
        $commande3=str_replace('"', '', $commande2);
        /*----------------------------------------------------------------------*/
        $nbrReclame=DB::select("select count(*) as '' from reclamation where reclamation.id='{$id}'");
        $reclame=json_encode($nbrReclame);
        $reclame2=str_replace (array('[', ']','{','}',':'), " " ,$reclame);
        $reclame3=str_replace('"', '', $reclame2);
        return view('clients.home')->with(['nbrReclamation'=>$reclame3,"nbrCommande"=>$commande3]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $id=auth()->user()->id;
        $clients=DB::select("select id,name,email,role,adress,telephone from users where id='{$id}' and role='1' ");
        return view('clients.indexProfile')->with(['client'=>$clients]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clients=User::where('id',$id)->first();
        return view('clients.showClient')->with([
            'client'=>$clients
        ]);
    }
    public function store($id)
    {
        // $id=auth()->user()->id;
        $clients=User::where('id',$id)->first();
        return view('clients.showClient')->with([
            'client'=>$clients
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients=User::where('id',$id)->first();
        return view('clients.editClient')->with([
            'client'=>$clients
        ]);
        // $clients=DB::select("select name,email,password,role from users where id='{$id}' ");
        // return view('clients.editClient')->with(['client'=>$clients]); 
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
        // $clients=User::where('id',$id)->first();
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'adress' => 'required',
            'telephone' => 'required',
        ]);
        $password=Hash::make($request->password);

        
        DB::update("update users set name=?,email=?,role=?,adress=?,telephone=? where id='{$id}'",[$request->name,$request->email,$request->role,$request->adress,$request->telephone]);
        return redirect()->route('client.index')->with([
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
        $clients=User::where('id',$id)->first();
        $clients->delete();
        return redirect()->route('client.index')->with([
            'sucess'=>'Client deleted successfuly'
        ]);
    }
}
