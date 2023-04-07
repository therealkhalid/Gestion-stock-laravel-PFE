<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FournisseurCatalogue extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=auth()->user()->id;
        $data=DB::select("SELECT id_catalogue,id,title,description,date_catalogue,image from catalogue WHERE  catalogue.id='{$id}' ");
        return view('Fournisseurs.ListCatalogue')->with(['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Fournisseurs.AddCatalogue');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('image')){
            $file=$request->image;
            $image_name=time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'),$image_name);
        };
        $id=auth()->user()->id;
        DB::insert("INSERT INTO catalogue(id,title,description,date_catalogue,image)VALUES(?,?,?,?,?)",[$id,$request->title,$request->description,$request->date_catalogue,$image_name]);
        return redirect()->route('catalogue.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $id=auth()->user()->id;
        // $data=User::where('id',$id)->first();
        // return view('Fournisseurs.showCatalogue')->with([
        //     'data'=>$data
        // ]);
        
        $data=DB::select("SELECT catalogue.id_catalogue,title,description,date_catalogue,image from catalogue where catalogue.id_catalogue='{$id}'");
        return view('Fournisseurs.showCatalogue')->with(['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data=DB::select("SELECT id_catalogue,title,description,date_catalogue,image from catalogue where catalogue.id_catalogue='{$id}'");
        return view('Fournisseurs.EditCatalogue')->with(['data'=>$data]);
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
        if($request->has('image')){
            $file=$request->image;
            $image_name=time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'),$image_name);
        };
        // $request->validate([
        //     'title'=>'required',
        //     'description'=>'required',
        //     'date_catalogue'=>'required',
        //     'image'=>'required'
        // ]);
        // $id=auth()->user()->id;
        DB::update("UPDATE catalogue SET title=?,description=?,date_catalogue=?,image=? WHERE catalogue.id_catalogue='{$id}'",[$request->title,$request->description,$request->date_catalogue,$image_name]);
        return redirect()->route('catalogue.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete("DELETE from catalogue WHERE catalogue.id_catalogue='{$id}'");
        return redirect()->route('catalogue.index')->with([
            'sucess'=>'Catalogue deleted successfuly'
        ]);
    }
}
