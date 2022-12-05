<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function create(){
        Auth::logout();
        return view('login');
    }

    public function store(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $user = User::where('email', '=', $request->email)->first();
        if($user==null) return "Usuario desconocido";
        else {
            if($user->password == $request->password){
                Auth::login($user);
                if($user->rol == 'Cliente') return redirect()->route('users.cliente');
                if($user->rol == 'Empleado') return redirect()->route('users.empleado');
                if($user->rol == 'Gerente') return redirect()->route('users.gerente');
            }else{
                echo 'Contraseña incorrecta';
            }
        }
    }
}
