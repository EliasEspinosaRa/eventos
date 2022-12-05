<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventoController extends Controller
{
   public function mostrarEventos($id){
        $evento = Evento::find($id);
        $id_user =  Auth::id(); 
        return view('Eventos.eventos',compact('evento', 'id_user'));
     }

     public function viewcreate(Request $request){
        $paquetes = $request->paquete;

        return view('crear-evento', compact('paquetes'));
     }

     public function create(Request $request, $paquetes){
        $user = Auth::id();
        $evento = new Evento();

        $evento->cliente_id = $user;
        $evento->nombre = $request->nombre;
        $evento->direccion = $request->direccion;
        $evento->fecha = $request->fecha;
        $evento->hora_inicio = $request->hora_inicio;
        $evento->hora_final = $request->hora_final;
        $evento->confirmado = 0;
        $evento->activo = 1;

        $evento->save();

        foreach($request->id as $id){
            $evento->paquete()->attach($id);
        }
       
        return redirect()->route('users.cliente');
    } 
}
