<?php

namespace App\Http\Controllers;

use App\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ClienteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.basic',['only'=>['store','update','destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $clientes=Clientes::all();

        $clientes=Cache::remember('cacheclientes',15/60,function() {

            return Clientes::simplePaginate(10);

        });

        return response()->json(['status'=>'OK', 'siguiente'=>$clientes->nextPageUrl(),'anterior'=>$clientes->previousPageUrl(),'data'=>$clientes->items()],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return "Se muestra formulario para crear un fabricante.";

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $cliente=Clientes::find($id);

        // Chequeamos si encontró o no el fabricante
        if (! $cliente)
        {
            // Se devuelve un array errors con los errores detectados y código 404
            return response()->json(['errors'=>Array(['code'=>404,'message'=>'No se encuentra un cliente con ese codigo.'])],404);
        }

        // Devolvemos la información encontrada.
        return response()->json(['status'=>'ok','data'=>$cliente],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        return "Se muestra formulario para editar Fabricante con id: $id";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
