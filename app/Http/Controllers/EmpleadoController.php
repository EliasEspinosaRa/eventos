<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Evento;
use App\Models\Paquete;
use Illuminate\Http\Request;
use App\Models\Abono;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

class EmpleadoController extends Controller
{
    public function eventos(){
        $eventos = DB::table('eventos')
        ->where('confirmado', '=', 1)
        
        ->select(DB::raw("CASE WHEN confirmado = 1 THEN 'Evento Confirmado'
                            ELSE 'No confirmado' END AS Confirmado"), "eventos.nombre", 
                            "eventos.direccion", "eventos.fecha", "eventos.hora_inicio"
                                ,"hora_final", "eventos.motivo", "users.name")
        ->join('users', 'users.id', '=', 'eventos.user_id')
        ->get();

        return response()->json([
            'Eventos' => $eventos,
        ]);
    }

    public function store(Request $request){
        // $id_evento = $request->idevento;
        $cantidad = $request->cantidad;
        // // $cantidad = 1000;
        // // $id_evento = 1;
        $evento = Evento::select('id')->first();
        $event = $evento->id; 
        $id_evento = $event;
        $restante = Paquete::select('precio')->first();
        $res = $restante->precio;
        $total = $res - $cantidad;
        $abono = new Abono([
            'evento_id' => $id_evento,
            'cantidad' => $cantidad,
            'restante' => $res,
            'total' => $total
        ]);

        $abono->save();
        // $data = [
        //     $id_evento,
        //     $cantidad, 
        //     $event
            
        // ];
        return response()->json([
            'msg' => 'Abono creado',
            // 'consut' => $res
            
        ]);
        
        public function viewFoto(Evento $evento){
        return view('Empleado.view-foto', compact('evento'));
    }

    public function add(Request $request, Evento $evento){
        $request->validate([
            'imagen.*'=>'required|image'
        ]);

        foreach($request->file('imagen') as $file){
            $user = Auth::id();
            $nombre = $file->getClientOriginalName();
            $file->storeAs('public/imagenes',$nombre);
            $imagenes = new Image();
            $imagenes->evento_id = $evento->id;
            $imagenes->user_id = $user;
            $imagenes->url = '/storage/imagenes/'.$nombre;
            $imagenes->save();
        }

        return redirect()->route('users.empleado');
    }
}
