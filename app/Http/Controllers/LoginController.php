<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        if (Auth::attempt((['email' => $request->email, 'password' => $request->password]))) {
            $user = Auth::user();
            $token= $user->createToken('app')->plainTextToken;
            $rol = $user->rol;
            $arr = array('acceso' => "ok", 'error' => "", 'token' => $token, 'rol' => $rol);

            return json_encode($arr);
        } else {
            $arr = array('acesso' => "denegado", 'token' => "", 'error' => "no existe el usuario o contraseña");
            return json_encode($arr);
        }
    }
}
