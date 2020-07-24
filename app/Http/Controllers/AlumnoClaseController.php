<?php

namespace App\Http\Controllers;

use App\Clases;
use App\Clases_Impartidas;
use App\Clientes;
use App\User;
use Illuminate\Http\Request;

class AlumnoClaseController extends Controller
{
    protected $titulo="Alumnos de la Clase ";

    public function verClase($id)
    {
        $nombre=$this->titulo;
        $clase_impartida=Clases_Impartidas::find($id);



        $clientes=$clase_impartida->clientes;


        if (is_null($clientes))
            $clientes=[];

        $usuarios=$clase_impartida->users;

            //Clientes::orderBy('id','DESC')->paginate(10);

        $campos=["nombre","apellido1","apellido2","telefono","email","cuota"];
        $campos2=["name","rol"];


        return view('AlumnoClase/index',compact('clientes','campos','nombre','id','usuarios','campos2'));
    }

    public function create($id)
    {
        $nombre="Agregar alumnos";

        $clase=Clases_Impartidas::find($id);

        $clientes_no=$clase->clientes->pluck('id')->toArray();
        $clientes = Clientes::whereNotIn('id',$clientes_no)->get();

        $campos=["nombre","apellido1","apellido2","telefono","email","cuota"];

        return view('AlumnoClase/create',compact('clientes','campos','nombre','id'));
    }

    public function store(Request $request)
    {

        $clase=Clases_Impartidas::find($request['clase']);
        $cliente=Clientes::find($request->id);

        $clase->clientes()->attach($cliente);

        return redirect()->action('AlumnoClaseController@verClase',$request['clase'])->with('success','Clientes creada satisfactoriamente');

    }

    public function destroy(Request $request)
    {

        Clases_Impartidas::find($request['clase'])->clientes()->detach(Clientes::find($request['alumno']));
        return redirect()->action('AlumnoClaseController@verClase',$request['clase'])->with('success','Clientes creada satisfactoriamente');

    }

}
