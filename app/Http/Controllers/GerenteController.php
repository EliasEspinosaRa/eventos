<?php

namespace App\Http\Controllers;

use App\Mail\CorreoMailable;
use App\Models\Evento;
use App\Models\Gasto;
use App\Models\Image;
use App\Models\Paquete;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class GerenteController extends Controller
{
  public function viewNuevoPaquete(){
        return view('Gerente.crear-nuevo-paquete');
    }

    public function nuevoPaquete(Request $request){
        $id = Auth::id();
        $paquete= new Paquete();
        $paquete->nombre = $request->nombre;
        $paquete->descripcion = $request->descripcion;
        $paquete->precio = $request->precio;
        $paquete->activo = $request->activo;
        $paquete->user_id = $id;
        /*if($request->activo == 'Si')$paquete->activo == 1;
        if($request->activo == 'No')$paquete->activo == 0;*/
        $paquete->save();
        foreach($request->file('imagen') as $file){
            $nombre = 'collection_'.time().$file->getClientOriginalName(); 
            $file->storeAs('/public/imagenes/', $nombre);

            $imagenes=new Image();
            $imagenes->paquete_id=$paquete->id;
            $imagenes->user_id = $id;
            $imagenes->url='/storage/imagenes/'.$nombre;
            $imagenes->save();
        }
    }

    public function infoEvento ($id_evento){
        $evento= Evento::find($id_evento);
        return view('Gerente.actualizar-evento', compact('evento'));
    }
    public function updateEvento( Evento $evento, Request $request){
        
        $evento->nombre = $request->nombre;
        $evento->direccion = $request->direccion;
        $evento->fecha = $request->fecha;
        $evento->hora_inicio = $request->hora_inicio;
        $evento->hora_final = $request->hora_final;
        $evento->motivo = $request->motivo;
        $evento->confirmado = $request->confirmado;
        $evento->activo = $request->activo;
        $evento->save();
    }

    public function gastosEvento($id_evento){
        $evento= Evento::find($id_evento);
        return view ('Gerente.gasto-evento',compact('evento'));
    }

    public function registroGasto($id_evento,Request $request){
        $gasto= new Gasto();
        $gasto->evento_id = $id_evento;
        $gasto->nombre = $request->nombre;
        $gasto->motivo =$request->motivo;
        $gasto->precio = $request->precio;
        $gasto->save();
    }
    
    public function ListarEventos(){
        $eventos = Evento::all();
        return view('Gerente.eventos-gerente',compact('eventos'));
    }

    public function confirmar($id,Request $request){  
        $evento = Evento::find($id);
        $evento->confirmado=1;
        $evento->gerente_id = $id;
        $evento->save();
        return redirect()->route('view-eventos.ListarEventos');
    }

    public function noConfirmar($id,Request $request){
        $evento = Evento::find($id);
        $evento->motivo = $request->motivo;
    
        $aux = User::where('id','=',$evento->cliente_id)->first();
        $correo = new CorreoMailable($evento);
        Mail::to($aux->email)->send($correo);
        $evento->save();
        
        return redirect()->route('view-eventos.ListarEventos');
    }
}
