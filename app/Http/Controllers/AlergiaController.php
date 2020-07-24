<?php

namespace App\Http\Controllers;

use App\Alergias;
use Illuminate\Http\Request;

class AlergiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alergias=Alergias::orderBy('id','DESC')->paginate(10);

        $campos=["nombre"];

        return view('Alergias/index',compact('alergias','campos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nombre="Alergia";
        return view('Alergias.create',compact("nombre"));
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

        $this->tratarAlergias($request);

        $this->validate($request,['nombre'=>'required']);
        $alergia=Alergias::create($request->all());

        return redirect()->route('alergia.index')->with('success','Alergias creada satisfactoriamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alergias=Alergias::orderBy('id','DESC')->paginate(10);
        return view('Alergias/index',compact('alergias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alergia=Alergias::find($id);
        $nombre="Alergia";


        return view('Alergias/editar',compact('nombre','alergia'));
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

        $alergia=Alergias::find($id)->update($request->all());
        //$this->revisarTags($request['description'],$id);

        return redirect()->route('alergia.index')->with('success','Registro actualizado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alergias::find($id)->delete();
        return redirect()->route('alergia.index')->with('success','Registro eliminado satisfactoriamente');

    }

    public function tratarAlergias($request)
    {


    }

}
