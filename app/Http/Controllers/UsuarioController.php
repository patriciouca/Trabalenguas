<?php

namespace App\Http\Controllers;


use App\Rol;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;

class UsuarioController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios=User::orderBy('id','DESC')->paginate(10);
        $nombre="Usuarios";

        foreach($usuarios as $usuario)
        {
            $usuario->rol=Rol::find($usuario->rol_id)->nombre;

        }

        $campos=["name","rol"];

        return view('Usuarios/index',compact('nombre','usuarios','campos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nombre="Usuario";
        $roles=Rol::all();

        return view('Usuarios.create',compact("nombre","roles"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,['name'=>'required']);
        $request->merge(["password"=>md5($request->password)]);
        $usuario=User::create($request->all());


        return redirect()->route('usuario.index')->with('success','Usuarios creada satisfactoriamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuarios=User::orderBy('id','DESC')->paginate(10);
        return view('Usuarios/index',compact('usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles=Rol::all();
        $usuario=User::find($id);
        $nombre="Usuario";


        return view('Usuarios/editar',compact('nombre','usuario','roles'));
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

        $this->validate($request,['name'=>'required']);

        if($request['password']==null)
            unset($request['password']);
        else
            $request->merge(["password"=>bcrypt($request->password)]);
        

        $usuario=User::find($id)->update($request->all());
        //$this->revisarTags($request['description'],$id);

        return redirect()->route('usuario.index')->with('success','Registro actualizado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('usuario.index')->with('success','Registro eliminado satisfactoriamente');

    }


}
