<?php

namespace App\Http\Controllers;

use App\Models\Abono;
use App\Models\Evento;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AjaxController extends Controller
{
    public function index(){
        $data['eventos'] = Evento::orderBy('id','asc')->paginate(5);
   
        return view('ajax-crud', $data);
    }
    
    public function update(Request $request){
        $evento = Evento::where('id', $request->id)->first();
        $evento->nombre = $request->nombre;
        $evento->direccion = $request->direccion;
        $evento->fecha = $request->fecha;
        $evento->hora_inicio = $request->hora_inicio;
        $evento->hora_final = $request->hora_final;
        $evento->save();
        return response()->json(['success' => true]);
    }
    
    public function edit(Request $request){   
        $where = array('id' => $request->id);
        $evento  = Evento::where($where)->first();
 
        return response()->json($evento);
    }
 
    public function destroy(Request $request){
        $evento = Evento::where('id', $request->id)->first();
        $evento->delete();

        return response()->json(['success' => true]);
    }

    public function foto(Request $request){
        $imagenes = Image::where('evento_id', $request->id)->get();
        return response()->json($imagenes);
    }

    public function deleteImg(Request $request){
        $foto = Image::where('id', $request->id)->first();
        $url = str_replace('storage', 'public', $foto->url);
        Storage::delete($url);
        $foto->delete();

        return response()->json(['success' => true]);
    }

    public function updateImg(Request $request){
        $foto = Image::where('id', $request->id)->first();

        /*$url = str_replace('storage', 'public', $foto->url);
        Storage::delete($url);*/

        $file = $request->imagen;
        $nombre = str_replace('C:\\fakepath\\', '', $file);
        //Storage::put('public/imagenes', $file);
        //$file->storeAs('public/imagenes',$nombre);
        //Storage::disk('local')->put($nombre, 'Contents');
        
        $foto->url = '/storage/imagenes/'.$nombre;
        $foto->save();

        return response()->json(['success' => true]);
    }

    public function viewAbono(Request $request){
        $evento = Evento::where('id', $request->id)->first();
        return response()->json($evento);
    }

    public function abono(Request $request){
        $evento = Evento::where('id', $request->id)->first();
        $abono_aux = Abono::latest('id')->where('evento_id', $evento->id)->first();
        $total = 0;

        foreach($evento->paquete as $paquete){
            $total = $total + $paquete->precio;
        }

        if($abono_aux == null) $restante = $total - $request->monto;
        else $restante = $abono_aux->restante - $request->monto;
        
        $abono = new Abono();

        $abono->evento_id = $request->id;
        $abono->cantidad = $request->monto;
        $abono->restante = $restante;
        $abono->total = $total;

        $abono->save();

        return response()->json(['success' => true]);
    }
}
