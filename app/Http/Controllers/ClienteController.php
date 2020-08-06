<?php

namespace App\Http\Controllers;

use App\Alergias;
use App\Aspectos;
use App\Clientes;
use App\Colegios;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ClienteController extends Controller
{

    protected $titulo="Alumnos";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nombre=$this->titulo;
        $clientes=Clientes::orderBy('id','DESC')->paginate(10);

        $campos=["nombre","apellido1","apellido2","telefono","email","cuota"];

        return view('Clientes/index',compact('clientes','campos','nombre'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nombre=$this->titulo;

        $aspectos=Aspectos::all();
        $alergias=$this->recuperarAlergias();
        $colegios=Colegios::all();

        return view('Clientes.create',compact("nombre","aspectos","alergias","colegios"));
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

        $this->tratarClientes($request);
        if(isset($request->fotoG))
        {
            $this->procesarFoto($request->file('fotoG'),$request);
        }

        //return storage_path().'fotos/';

        if(isset($request->informeG))
        {
            $this->procesarInforme($request->file('informeG'),$request);
            $request->merge(["presenta_informe"=>1]);

        }



        $this->validate($request,['nombre'=>'required']);
        $cliente=Clientes::create($request->all());

        $cliente->alergias()->attach($request->alergias);

        $cliente->aspectos()->attach($request->aspectos);


        return redirect()->route('cliente.index')->with('success','Clientes creada satisfactoriamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes=Clientes::orderBy('id','DESC')->paginate(10);
        return view('Clientes/index',compact('clientes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente=Clientes::find($id);
        $nombre=$this->titulo;

        $aspectos=Aspectos::all();
        $colegios=Colegios::all();
        $alergias=$this->recuperarAlergias();


        return view('Clientes/editar',compact('nombre','cliente',"aspectos","alergias","colegios"));
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
        if(isset($request->fotoG))
            $this->procesarFoto($request->file('fotoG'),$request);


        if(isset($request->informeG))
        {
            $this->procesarInforme($request->file('informeG'),$request);
            $request->merge(["presenta_informe"=>1]);
        }


        $cliente=Clientes::find($id)->update($request->all());
        //$this->revisarTags($request['description'],$id);
        if($cliente)
        {
            $cliente=Clientes::find($id);
            if(isset($request->alergias))
            {
                $cliente->alergias()->detach();
                $cliente->alergias()->attach($request->alergias);
            }

            if(isset($request->aspectos))
            {
                $cliente->aspectos()->detach();
                $cliente->aspectos()->attach($request->aspectos);

            }
        }

        return redirect()->route('cliente.index')->with('success','Registro actualizado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Clientes::find($id)->delete();
        return redirect()->route('cliente.index')->with('success','Registro eliminado satisfactoriamente');

    }

    public function tratarClientes($request)
    {


    }

    public function recuperarAlergias()
    {
        $alergias=Alergias::all();


        return $alergias;

    }

    public function tratarAlergias($cliente,$alergias)
    {

    }

    public function tratarAspectos($aspectos)
    {


    }

    public function procesarFoto($file,$request)
    {

        $current_date_time = Carbon::now()->toDateTimeString();
        $current_date_time=str_replace(":", "",$current_date_time);
        $current_date_time=str_replace("-", "",$current_date_time);
        $current_date_time=str_replace(" ", "",$current_date_time);

        $name=$current_date_time."_foto.".$file->extension();

        $request->merge(["foto"=>$name]);

        Storage::disk('local')->putFileAs('fotos/', $file, $name);


        //$image_resize = Image::make(storage_path().'\fotos/'.$name);

        //$image_resize->resize(300, 300);
        //Storage::disk('local')->putFileAs('fotos/', $image_resize, $name);

    }

    public function procesarInforme($file,$request)
    {

        $current_date_time = Carbon::now()->toDateTimeString();
        $current_date_time=str_replace(":", "",$current_date_time);
        $current_date_time=str_replace("-", "",$current_date_time);
        $current_date_time=str_replace(" ", "",$current_date_time);

        $name=$current_date_time."_informe.".$file->extension();

        $request->merge(["informe"=>$name]);

        Storage::disk('local')->putFileAs('informes/', $file, $name);

    }


}

