<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        $imagen =  $request->file('file');

        $nombreImagen = Str::uuid() . "." . $imagen->extension();

        // DE ESTA MANERA USAMOS INTERNVENTION IMAGE
        $imagenServidor = Image::make($imagen);
        // LE ASIGNAMOS UN TAMAÑO DE 1000x1000 PIXELES
        $imagenServidor->fit(1000, 1000);
        // CREAMOS UNA CARPETA EN PUBLIC LLAMADA UPLOADS Y LA CONECTAMOS CON EL NOMBRE DE LA IMAGEN
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
        // GUARDAMOS LA IMAGEN
        $imagenServidor->save($imagenPath);

        // EL RESPONE JSON CONVERTIRA A JSON EL ARREGLO DE IMAGEN
        return response()->json(['imagen' => $nombreImagen]);
    }
}
