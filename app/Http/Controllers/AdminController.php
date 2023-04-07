<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */
    public function afficher()
    {
        $nbrclients=DB::select("select count(*) as '' from users where role='1' ");
        $client=json_encode($nbrclients);
        $client2=str_replace (array('[', ']','{','}',':'), " " ,$client);
        $client3=str_replace('"', '', $client2);
        /*--------------------------------- */
        $nbrFournisseur=DB::select("select count(*) as '' from users where role='2' ");
        $fournissseur=json_encode($nbrFournisseur);
        $fournissseur2=str_replace (array('[', ']','{','}',':'), " " ,$fournissseur);
        $fournissseur3=str_replace('"', '', $fournissseur2);
        /*--------------------------------- */
        $nbrLivreurs=DB::select("select count(*) as '' from users where role='3' ");
        $livreur=json_encode($nbrLivreurs);
        $livreur2=str_replace (array('[', ']','{','}',':'), " " ,$livreur);
        $livreur3=str_replace('"', '', $livreur2);
        /*--------------------------------- */
        $nbrCommande=DB::select("select count(*) as '' from commande");
        $commande=json_encode($nbrCommande);
        $commande2=str_replace (array('[', ']','{','}',':'), " " ,$commande);
        $commande3=str_replace('"', '', $commande2);
        /*--------------------------------- */
        $nbrCatalogue=DB::select("select count(*) as '' from catalogue");
        $catalogue=json_encode($nbrCatalogue);
        $catalogue2=str_replace (array('[', ']','{','}',':'), " " ,$catalogue);
        $catalogue3=str_replace('"', '', $catalogue2);
        /*--------------------------------- */
        $nbrReclamation=DB::select("select count(*) as '' from reclamation");
        $reclame=json_encode($nbrReclamation);
        $reclame2=str_replace (array('[', ']','{','}',':'), " " ,$reclame);
        $reclame3=str_replace('"', '', $reclame2);
        
        return view('admin.admin')->with([
            'nbrClients'=>$client3,
            'nbrFournisseur'=>$fournissseur3,
            'nbrLivreur'=>$livreur3,
            'nbrReclamation'=>$reclame3,
            'nbrCatalogue'=>$catalogue3,
            'nbrCommande'=>$commande3,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registration');
    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $id=auth()->user()->id;
        $admin=DB::select("select id,name,email,password,role,adress,telephone from users where id='{$id}' ");
        return view('admin.index')->with(['admin'=>$admin]);

    }

    
/**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'role'=>'required',
            'adress'=>'required',
            'telephone'=>'required',
            'password'=>'required',
        ]);
        $name=$request->name;
        $email=$request->email;
        $role=$request->role;
        $adress=$request->adress;
        $telephone=$request->telephone;
        $password=Hash::make($request->password);
        DB::insert("insert into users(name,email,role,password,adress,telephone)VALUES(?,?,?,?,?,?)",[$name,$email,$role,$password,$adress,$telephone]);
        //  User::create([
        //     'name' => $request['name'],
        //     'email' => $request['email'],
        //     'role'=>$request['role'],
        //     'password' => Hash::make($request['password']),
        // ]);
        // $input = $request->all();
        // User::create($input);
        return redirect()->route('home.admin');

    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin=User::where('id',$id)->first();
        return view('admin.showAdmin')->with([
            'admin'=>$admin
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
        $admin=User::where('id',$id)->first();
        return view('admin.editAdmin')->with([
            'admin'=>$admin
        ]);
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
        return redirect()->route('home.admin')->with([
            'sucess'=>'Admin updated successfuly'
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
        $admin=User::where('id',$id)->first();
        $admin->delete();
        return redirect()->route('home.admin')->with([
            'sucess'=>'Admin deleted successfuly'
        ]);
    }
}
