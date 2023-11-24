<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {   
        // MANDAMOS CON EL CONSTRUCTOR QUE EL USUARIO ESTE AUTENTICADO PARA ACCEDER A LA PAGINA 
        $this->middleware('auth');
    }
    
    public function index(User $user)
    {

        // EXTRAEMOS LOS POST QUE CONTIENE EL USER MEDIANTE EL ID
        $posts = Post::where('user_id', $user->id)->get();

        // MANDAMOS LA VARIABLE DE USERNAME A LA VISTA
        return view('dashboard', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);

        // ESTA ES UNA FORMA DE CREAR REGISTROS
        // Post::create([
        //     'titulo' => $request->titulo,
        //     'descripcion' => $request->descripcion,
        //     'imagen' => $request->imagen,
        //     'user_id' => auth()->user()->id
        // ]);

        // OTRA FORMA DE CREAR REGISTROS
        // $post = new Post;
        // $post->titulo = $request->titulo;
        // $post->descripcion = $request->descripcion;
        // $post->imagen = $request->imagen;
        // $post->user_id = auth()->user()->id;
        // $post->save();

        // ESTA FORMA SE USA CUANDO YA CREAMOS LAS RELACIONES EN NUESTRA BASE DE DATOS
        // USAMOS EL REQUEST PARA ACCEDER AL USUARIO AUTENTICADO, LUEGO A LA RELACION CREADA Y DESPUES CREAMOS LOS DATOS PARA GUARDARLO
        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);
        
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
