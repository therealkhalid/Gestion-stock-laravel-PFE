<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientReclamation extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=auth()->user()->id;
        $data=DB::select("select id_reclamation,message,date_reclamation from reclamation where reclamation.id='{$id}'");
        return view('clients.ListReclamation')->with(['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.addReclamation');
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
            'message'=>'required',
            'date_reclamation'=>'required',
        ]);
        $id=auth()->user()->id;
        DB::insert("insert into reclamation(id,message,date_reclamation)VALUES(?,?,?)",[$id,$request->message,$request->date_reclamation]);
        return redirect()->route('reclamation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=DB::select("SELECT id_reclamation,message,date_reclamation FROM reclamation WHERE reclamation.id_reclamation='{$id}'");
        
        return view('clients.ShowReclamation')->with([
            'data'=>$data
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
        //$id2=auth()->user()->id;
        // $data=User::where('id_reclamation,',$id)->first();
        // return view('clients.EditReclamation')->with([
        //     'data'=>$data
        // ]);
        // $id2=auth()->user()->id;
        $data=DB::select("SELECT id_reclamation,message,date_reclamation FROM reclamation WHERE reclamation.id_reclamation='{$id}'");
        
        return view('clients.EditReclamation')->with([
            'data'=>$data
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
            'message' => 'required',
            'date_reclamation' => 'required',
        ]);

        DB::update("update reclamation set message=?,date_reclamation=? where id_reclamation='{$id}'",[$request->message,$request->date_reclamation]);
        return redirect()->route('reclamation.index')->with([
            'sucess'=>'Reclamation updated successfuly'
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
        DB::delete("DELETE from reclamation WHERE reclamation.id_reclamation='{$id}'");
        return redirect()->route('reclamation.index')->with([
            'sucess'=>'Reclamation deleted successfuly'
        ]);
    }
}
