<?php 

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view ('auth.register');
    }

    public function store(Request $request)
    {
        // MODIFICA EL REQUEST 
        // CONVIERTE LOS ESPACIOS EN - Y ELIMINA CARACTERES ESPECIALES
        // SE EDITO EL REQUEST PARA QUE ARROJE EL ERROR EN LA VISTA Y NO ERROR DE MYSQL
        $request->request->add(['username' => Str::slug($request->username)]);

        // VALIDAMOS EL REGISTRAR
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|max:15|min:5|unique:users',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6|max:15|confirmed',
        ]);

        User::create([ // SUSTITUYE EL INSERT INTO 
            'name' => $request->name,
            'username' => $request->username, 
            'email' => $request->email,
            'password' => Hash::make( $request->password ) // HASH encripta el password
        ]);

        // AUTENTICAR USUARIO
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        // OTRA FORMA DE AUTENTICAR
        // auth()->attempt($request->only('email','password'));
        // LE ESTAMOS DICIENDO QUE DEL 'REQUEST' SOLO TOME EL EMAIL Y EL PASSWORD

        // REDIRECCIONAR
        return redirect()->route('posts.index', auth()->user()->username);

    }
}