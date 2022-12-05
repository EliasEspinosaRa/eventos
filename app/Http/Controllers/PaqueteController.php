<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use Illuminate\Http\Request;

class PaqueteController extends Controller
{
      public function create(){
        $paquetes = Paquete::all();
        return view('ver-paquete', compact('paquetes'));
    }
}
