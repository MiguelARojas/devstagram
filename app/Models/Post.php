<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // EL FILLABLE ES LO QUE SE VA A LLENAR EN LA BASE DE DATOS
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    public function user()
    {
        // UNA RELACION INVERSA UN POST PERTENECE A UN USUARIO Y NOS TRAEMOS SOLAMENTE EL NOMBRE Y EL USERNAME
        return $this->belongsTo(User::class)->select(['name', 'username']);
    }
}
