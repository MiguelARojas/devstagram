<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {   
        // MANDAMOS CON EL CONSTRUCTOR QUE EL USUARIO ESTE AUTENTICADO PARA ACCEDER A LA PAGINA 
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('dashboard');
    }
}
