<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Paquete;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   public function cliente(){
        $paquetes = Paquete::all();
        return view('cliente', compact('paquetes'));
    }

    public function gerente(){
        return view('Gerente.gerente');
    }

    public function empleado(){
        $eventos = Evento::all();
        return view('Empleado.empleado', compact('eventos'));
        //return redirect()->route('eventos');
    }

    public function anonimo(){
        $paquetes = Paquete::all();
        return view('cliente', compact('paquetes'));
    }

    public function update(Request $request){
        $flag = 0;
        $request->validate([
            'email'=>'required',
            'password'=>'required',
            'newpassword'=>'required'
        ]);
        $id = Auth::user();
        $users = User::all();
        foreach($users as $user){
            if($user->email == $request->email && $user->password == $request->password && $id->rol=='Gerente'){
                $user->password = $request->newpassword;
                $user->save();
                $flag = 1;
            }
        }
        if($flag == 0) return 'No se encontro el usuario';
        return redirect()->route('users.create');
    }

    public function create(){
        $usuarios = User::all();
        return view('Gerente.view-user', compact('usuarios'));
    }

    public function viewUpdate(User $usuario){
        return view('update-password', compact('usuario'));
    }  
}
