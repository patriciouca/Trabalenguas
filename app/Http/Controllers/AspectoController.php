<?php

namespace App\Http\Controllers;

use App\Aspectos;
use Illuminate\Http\Request;

class AspectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aspectos=Aspectos::orderBy('id','DESC')->paginate(10);

        $campos=["nombre"];

        return view('Aspectos/index',compact('aspectos','campos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nombre="Aspecto";
        return view('Aspectos.create',compact("nombre"));
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

        $this->tratarAspectos($request);

        $this->validate($request,['nombre'=>'required']);
        $aspecto=Aspectos::create($request->all());

        return redirect()->route('aspecto.index')->with('success','Aspectos creada satisfactoriamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aspectos=Aspectos::orderBy('id','DESC')->paginate(10);
        return view('Aspectos/index',compact('aspectos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aspecto=Aspectos::find($id);
        $nombre="Aspecto";


        return view('Aspectos/editar',compact('nombre','aspecto'));
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

        $aspecto=Aspectos::find($id)->update($request->all());
        //$this->revisarTags($request['description'],$id);

        return redirect()->route('aspecto.index')->with('success','Registro actualizado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Aspectos::find($id)->delete();
        return redirect()->route('aspecto.index')->with('success','Registro eliminado satisfactoriamente');

    }

    public function tratarAspectos($request)
    {


    }

}
