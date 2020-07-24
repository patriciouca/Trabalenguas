<?php

namespace App\Http\Controllers;

use App\Clientes;
use App\Gastos;
use App\Recibos;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReciboController extends Controller


{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $campos=["concepto","precio","fecha_recibo","cliente"];

        $meses=["","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Noviembre","Diciembre"];
        $mesI = $_GET['id'];

        $precio=0;

        $recibos=Recibos::where('fecha_recibo', 'like', '%-%'.$mesI."%-%")->orderBy('id','DESC')->paginate(10);


        foreach ($recibos as $recibo)
        {
            $cliente=Clientes::find($recibo->cliente_id);
            $precio+=$recibo['precio'];
            $recibo['cliente']=$cliente['nombre'].' '.$cliente['apellido1'].' '.$cliente['apellido2'];
        }

        return view('Recibos/index',compact('recibos','campos',"meses","mesI","precio"));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nombre="Recibo";

        $clientes=Clientes::all();

        return view('Recibos.create',compact("nombre",'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request,['concepto'=>'required','precio'=>'required']);
        $recibo=Recibos::create($request->all());

        return redirect()->route('recibo.index',["id"=>Carbon::now()->month])->with('success','Recibos creada satisfactoriamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recibos=Recibos::orderBy('id','DESC')->paginate(10);
        return view('Recibos/index',compact('recibos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recibo=Recibos::find($id);
        $nombre="Recibo";
        $clientes=Clientes::all();


        return view('Recibos/editar',compact('nombre','recibo','clientes'));
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

        $this->validate($request,['concepto'=>'required','precio'=>'required']);

        $recibo=Recibos::find($id)->update($request->all());
        //$this->revisarTags($request['description'],$id);

        return redirect()->route('recibo.index',["id"=>Carbon::now()->month])->with('success','Registro actualizado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Recibos::find($id)->delete();
        return redirect()->route('recibo.index',["id"=>Carbon::now()->month])->with('success','Registro eliminado satisfactoriamente');

    }


}
