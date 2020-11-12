<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lentes;

class lentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lentes = lentes::orderBy('id','DESC')->paginate(3);
        return view('index',compact('lentes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,['nombre'=>'required','codigo'=>'required','descripcion'=>'required','precio'=>'required']);
        lentes::create($request->all());
        return redirect()->route('lentes.index')->with('success','Registro realizado');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lentes = lentes::find($id);
        return view('show',compact('libros'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $lentes = lentes::find($id);
        return view('edit',compact('lentes'));

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
        $this->validate($request,['nombre'=>'required','codigo'=>'required','descripcion'=>'required','precio'=>'required']);
        lentes::find($id)->update(($request->all()));
        return redirect()->route('lentes.index')->with('success','Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        lentes::find($id)->delete();
        return redirect()->route('lentes.index')->with('success','Registro eliminado');
    }

}
