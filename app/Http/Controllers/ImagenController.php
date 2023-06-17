<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        $imagen =  $request->file('file');

        // EL RESPONE JSON CONVERTIRA A JSON EL ARREGLO DE IMAGEN
        return response()->json(['imagen' => $imagen->extension() ]);
    }
}
