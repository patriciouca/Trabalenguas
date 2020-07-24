<?php

namespace App\Http\Controllers;

use App\Colegios;
use Illuminate\Http\Request;

class ColegioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colegios=Colegios::orderBy('id','DESC')->paginate(10);
        $campos=["nombre","duracion"];

        return view('Colegios/index',compact('colegios','campos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nombre="Colegio";
        return view('Colegios.create',compact("nombre"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //var_dump( explode(" ", $request['description']));


        $this->validate($request,['nombre'=>'required']);
        $colegio=Colegios::create($request->all());

        return redirect()->route('colegio.index')->with('success','Colegios creada satisfactoriamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $colegios=Colegios::orderBy('id','DESC')->paginate(10);
        return view('Colegios/index',compact('colegios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colegio=Colegios::find($id);
        $nombre="Colegio";


        return view('Colegios/editar',compact('nombre','colegio'));
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

        $this->validate($request,[ 'nombre'=>'required']);

        $colegio=Colegios::find($id)->update($request->all());
        //$this->revisarTags($request['description'],$id);

        return redirect()->route('colegio.index')->with('success','Registro actualizado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Colegios::find($id)->delete();
        return redirect()->route('colegio.index')->with('success','Registro eliminado satisfactoriamente');

    }


}