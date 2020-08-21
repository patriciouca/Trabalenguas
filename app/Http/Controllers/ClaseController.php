<?php

namespace App\Http\Controllers;

use App\Clases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ClaseController extends Controller
{
    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clases=Clases::orderBy('id','DESC')->paginate(10);
        $campos=["nombre","duracion"];



        return view('Clases/index',compact('clases','campos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nombre="Clase";
        return view('Clases.create',compact("nombre"));
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
        $clase=Clases::create($request->all());

        return redirect()->route('clase.index')->with('success','Clases creada satisfactoriamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clases=Clases::orderBy('id','DESC')->paginate(10);
        return view('Clases/index',compact('clases'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clase=Clases::find($id);
        $nombre="Clase";


        return view('Clases/editar',compact('nombre','clase'));
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

        $clase=Clases::find($id)->update($request->all());
        //$this->revisarTags($request['description'],$id);

        return redirect()->route('clase.index')->with('success','Registro actualizado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Clases::find($id)->delete();
        return redirect()->route('clase.index')->with('success','Registro eliminado satisfactoriamente');

    }


}
