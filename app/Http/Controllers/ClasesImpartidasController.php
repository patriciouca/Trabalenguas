<?php

namespace App\Http\Controllers;

use App\Clases;
use App\Clases_Impartidas;
use App\User;
use DateTime;
use Illuminate\Http\Request;

class ClasesImpartidasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clases_impartidas=Clases_Impartidas::orderBy('id','DESC')->paginate(10);

        $dias=["Lunes","Martes","Miercoles","Jueves","Viernes"];



        foreach($clases_impartidas as $clase){
            $id=$clase['clase_id'];

            $clase_modelo=Clases::find($id);
            $clase['dia']=$dias[$clase['dia']];

            $mifecha = new DateTime($clase['hora']);
            $mifecha->modify('+'.$clase_modelo->duracion.'minutes');

            $clase["hora fin"]=$mifecha->format('H:i');
        }

        $campos=["dia","hora","hora fin"];

        return view('Clases_Impartidas/index',compact('clases_impartidas','campos',"dias"));

    }

    public function horario()
    {
        $clases_impartidas=Clases_Impartidas::orderBy('id','DESC')->paginate(10);

        $dias=["Lunes","Martes","Miercoles","Jueves","Viernes"];

        $primero=[];
        $segundo=[];

        $horas=["15:30","16:15","17:00","17:45","18:30","19:15","20:00","20:45"];

        foreach($clases_impartidas as $clase){
            $id=$clase['clase_id'];

            $clase_modelo=Clases::find($id);

            $mifecha = new DateTime($clase['hora']);
            $mifecha->modify('+'.$clase_modelo->duracion.'minutes');

            $clase["hora_fin"]=$mifecha->format('H:i');

            if($clase_modelo->nombre=="PT" or $clase_modelo->nombre=="AL")
            {
                array_push($primero,$clase);

            }
            else
                array_push($segundo,$clase);
        }

        $campos=["dia","hora","hora fin"];

        return view('Clases_Impartidas/horario',compact('horas','primero','segundo','campos',"dias"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profesores=User::all();
        $clases=$this->tratarClases();
        $nombre="Clases_Impartida";
        $dias=['Lunes',"Martes","Miercoles","Jueves","Viernes"];

        return view('Clases_Impartidas.create',compact("nombre","clases","profesores","dias"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $dias=$request->all()['diaS'];

        foreach ($dias as $dia)
        {
            $request->merge(["dia"=>$dia]);
            $clases_impartida=Clases_Impartidas::create($request->all());

            $clase=Clases::find($request->all()['clase']);
            $profesor=User::find($request->all()['profesor']);

            $clases_impartida->clases()->associate($clase)->save();
            $clases_impartida->users()->attach($profesor);
        }


        return redirect()->route('clases_impartida.index')->with('success','Clases_Impartidas creada satisfactoriamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clases_impartidas=Clases_Impartidas::orderBy('id','DESC')->paginate(10);
        return view('Clases_Impartidas/index',compact('clases_impartidas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clases_impartida=Clases_Impartidas::find($id);


        $clases_impartida["profesor_id"]=$clases_impartida->users[0]->id;

        $dias=['Lunes',"Martes","Miercoles","Jueves","Viernes"];

        $nombre="Clases_Impartida";
        $clases=$this->tratarClases();
        $profesores=User::all();


        return view('Clases_Impartidas/editar',compact('nombre','dias','clases_impartida',"clases","profesores"));
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

        $this->validate($request,['profesor'=>'required']);

        $request->merge(["dia"=>$request['diaS'][0]]);

        $clases_impartida=Clases_Impartidas::find($id)->update($request->all());
        //$this->revisarTags($request['description'],$id);

        Clases_Impartidas::find($id)->clases()->dissociate();
        Clases_Impartidas::find($id)->users()->detach();


        Clases_Impartidas::find($id)->clases()->associate(Clases::find($request['clase']))->save();
        Clases_Impartidas::find($id)->users()->attach(User::find($request['profesor']));


        return redirect()->route('clases_impartida.index')->with('success','Registro actualizado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Clases_Impartidas::find($id)->delete();
        return redirect()->route('clases_impartida.index')->with('success','Registro eliminado satisfactoriamente');

    }

    public function tratarClases()
    {
        $clases=Clases::all();
        return $clases;
    }

}
