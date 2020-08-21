<?php

namespace App\Http\Controllers;

use App\Gastos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GastoController extends Controller
{
    public function __construct()
    {
        $rol = session('rol');
        if(!isset($rol))
            Redirect::to('login')->send();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campos=["concepto","precio"];

        $meses=["","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Noviembre","Diciembre"];
        $mesI = $_GET['id'];


        $gastos=Gastos::where('fecha_recibo', 'like', '%-%'.$mesI."%-%")->paginate(10);

        $precio=0;

        return view('Gastos/index',compact('gastos','campos',"meses","mesI","precio"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nombre="Gasto";
        return view('Gastos.create',compact("nombre"));
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


        $this->validate($request,['concepto'=>'required','precio'=>'required']);

        $gasto=Gastos::create($request->all());

        return redirect()->route('gasto.index',["id"=>Carbon::now()->month]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gastos=Gastos::orderBy('id','DESC')->paginate(10);
        return view('Gastos/index',compact('gastos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gasto=Gastos::find($id);
        $nombre="Gasto";


        return view('Gastos/editar',compact('nombre','gasto'));
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

        $gasto=Gastos::find($id)->update($request->all());
        //$this->revisarTags($request['description'],$id);

        return redirect()->route('gasto.index',["id"=>Carbon::now()->month]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gastos::find($id)->delete();
        return redirect()->route('gasto.index',["id"=>Carbon::now()->month]);

    }


}
