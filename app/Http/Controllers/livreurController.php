<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class livreurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livreurs=DB::select("select id,name,email,password,role,adress,telephone from users where role='3' ");
        return view('Livreurs.index')->with(['livreur'=>$livreurs]); 
    }
    public function afficher()
    {
        $id=auth()->user()->id;
        $nbrLivraison=DB::select("select count(*) as '' from livraison where livraison.id='{$id}' and etat=0");
        $livraison=json_encode($nbrLivraison);
        $livraison2=str_replace (array('[', ']','{','}',':'), " " ,$livraison);
        $livraison3=str_replace('"', '', $livraison2);
        /*---------------------------------------------------------- */
        $nbrLivraison2=DB::select("SELECT count(*) as '' FROM livraison WHERE id='{$id}' and etat=1");
        $livrer=json_encode($nbrLivraison2);
        $livrer2=str_replace (array('[', ']','{','}',':'), " " ,$livrer);
        $livrer3=str_replace('"', '', $livrer2);
        
        return view('Livreurs.home')->with(["nbrLivraison"=>$livraison3,"nbrLivraison2"=>$livrer3]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id=auth()->user()->id;
        $livreurs=DB::select("select id,name,email,role,adress,telephone from users where id='{$id}' and role='3' ");
        return view('livreurs.index')->with(['livreur'=>$livreurs]);
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
        $livreurs=User::where('id',$id)->first();
        return view('Livreurs.showLivreur')->with([
            'livreur'=>$livreurs
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
        $livreurs=User::where('id',$id)->first();
        return view('Livreurs.editLivreur')->with([
            'livreur'=>$livreurs
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
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'adress' => 'required',
            'telephone' => 'required',
        ]);
        
        DB::update("update users set name=?,email=?,role=?,adress=?,telephone=? where id='{$id}'",[$request->name,$request->email,$request->role,$request->adress,$request->telephone]);
        return redirect()->route('livreurs.index')->with([
            'sucess'=>'Livreur updated successfuly'
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
        $livreurs=User::where('id',$id)->first();
        $livreurs->delete();
        return redirect()->route('client.index')->with([
            'sucess'=>'Livreur deleted successfuly'
        ]);
    }
}
