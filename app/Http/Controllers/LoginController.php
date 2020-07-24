<?php

namespace App\Http\Controllers;

use App\Recibos;
use App\User;
use Illuminate\Http\Request;

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

        return view('login');
    }

    public function acceso(Request $request) {



        $usuario=User::where("name", '=', $request['user'])->first();


        if($usuario->rol_id==1)
        {

            if(strcmp(md5($request['password']), $usuario->password) == 0)
            {
                return "ok";
            }
        }

        return "no";
    }

    /*public function someAdminStuff(Request $request) {
        $request->user()->authorizeRoles('admin');
        return view('some.view');
    }*/
}
