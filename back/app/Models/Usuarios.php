<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $fillable = ['imagen', 'nombre', 'email', 'password', 'apellido', 'cedula', 'direccion', 'estado', 'ciudad', 'telefono', 'isAdmin'];
    protected $hidden = ['password', 'remember_token'];
    use HasFactory;
}
