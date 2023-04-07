<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fournisseurs=DB::select("select id,name,email,password,role,adress,telephone from users where role='2' ");
        return view('Fournisseurs.index')->with(['fournisseur'=>$fournisseurs]); 
    }
    public function afficher()
    {
        $id=auth()->user()->id;
        $nbrCatalogue=DB::select("select count(*) as '' from catalogue where catalogue.id='{$id}'");
        $catalogue=json_encode($nbrCatalogue);
        $catalogue2=str_replace (array('[', ']','{','}',':'), " " ,$catalogue);
        $catalogue3=str_replace('"', '', $catalogue2);
        return view('Fournisseurs.home')->with(["nbrCatalogue"=>$catalogue3]);
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
        $fournisseurs=User::where('id',$id)->first();
        return view('Fournisseurs.showFournisseur')->with([
            'fournisseur'=>$fournisseurs
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
        $fournisseurs=User::where('id',$id)->first();
        return view('Fournisseurs.editFournisseur')->with([
            'fournisseur'=>$fournisseurs
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
        return redirect()->route('fournisseures.index')->with([
            'sucess'=>'Fournisseur updated successfuly'
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
        $fournisseurs=User::where('id',$id)->first();
        $fournisseurs->delete();
        return redirect()->route('fournisseures.index')->with([
            'sucess'=>'Fournisseurs deleted successfuly'
        ]);
    }
}
