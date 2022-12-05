<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function update(Request $request, Image $imagen, Evento $evento){
        $request->validate([
            'imagen'=>'required|image'
        ]);

        $user = Auth::id();

        $url = str_replace('storage', 'public', $imagen->url);
        Storage::delete($url);

        $file = $request->file('imagen');
        $nombre = $file->getClientOriginalName();
        $file->storeAs('public/imagenes',$nombre);
        
        $imagen->url = '/storage/imagenes/'.$nombre;
        $this->authorize('validar', $user, $imagen);
        $imagen->save();

        return redirect()->route('Eventos.mostrarEventos', $evento->id);
    }

    public function delete(Image $imagen, Evento $evento){

        $user = Auth::id();

        $url = str_replace('storage', 'public', $imagen->url);
        Storage::delete($url);
        $this->authorize('validar', $user, $imagen);
        $imagen->delete();

        return redirect()->route('Eventos.mostrarEventos', $evento->id);
    }
}
