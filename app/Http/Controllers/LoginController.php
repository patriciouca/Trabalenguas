<?php

namespace App\Http\Controllers;

use App\Recibos;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    /*
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $request->user()->authorizeRoles(['user', 'admin']);
        return view('home');
    }
    */

    public function index() {

        $error=Session::get('error');
        return view('login2',compact("error"));

    }

    public function acceso(Request $request) {



        $usuario=User::where("name", '=', $request['user'])->first();

        if(isset($usuario))
        {




            if($usuario->rol_id==1)
            {

                if(strcmp(md5($request['password']), $usuario->password) == 0)
                {

                    $request->session()->put('rol', 'admin');
                    $request->session()->put('id', $usuario->id);
                    return redirect('horario');
                }
            }
            else if($usuario->rol_id==2){
                if(strcmp(md5($request['password']), $usuario->password) == 0)
                {
                    $request->session()->put('rol', 'user');
                    $request->session()->put('id', $usuario->id);
                    return redirect('horario');
                }
            }
        }

        $error="Usuario incorrecto";
        Redirect::to('login')->with( ['error' => $error] )->send();


    }

    public function logout(){
        session()->forget('rol');
        Redirect::to('login')->send();
    }

    /*public function someAdminStuff(Request $request) {
        $request->user()->authorizeRoles('admin');
        return view('some.view');
    }*/
}
