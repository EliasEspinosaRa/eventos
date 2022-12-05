<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistroUsuarioController extends Controller
{
     public function create(){
        return view('registrar-user');
    }

    public function store(Request $request){
        $request->validate([
            'nombre'=>'required',
            'apellido_p'=>'required',
            'apellido_m'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);

        $user = new User();
        $user->nombre = $request->nombre;
        $user->apellido_p = $request->apellido_p;
        $user->apellido_m = $request->apellido_m;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->rol = "Cliente";

        $user->save();
        return redirect()->route('registers.create');
    }

    public function registrar(Request $request){
        $request->validate([
            'nombre'=>'required',
            'apellido_p'=>'required',
            'apellido_m'=>'required',
            'email'=>'required',
            'password'=>'required',
            'rol'=>'required'
        ]);

        $user = new User();
        $user->nombre = $request->nombre;
        $user->apellido_p = $request->apellido_p;
        $user->apellido_m = $request->apellido_m;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->rol = $request->rol;

        $user->save();
        return redirect()->route('users.gerente');
    }

    public function view(){
        return view('registrar-user');
    }
}
