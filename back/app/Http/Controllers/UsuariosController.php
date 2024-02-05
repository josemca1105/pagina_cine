<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuariosController extends Controller
{
    //
    public function index()
    {
        $usuarios = Usuarios::all();
        return response()->json($usuarios);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|min:3|max:10',
            'email' => 'required|email|unique:usuarios|min:11',
            'password' => 'required|min:8|max:15',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }

        $usuarios = new Usuarios([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'apellido' => $request->input('apellido'),
            'cedula' => $request->input('cedula'),
            'direccion' => $request->input('direccion'),
            'estado' => $request->input('estado'),
            'ciudad' => $request->input('ciudad'),
            'telefono' => $request->input('telefono'),
        ]);

        $usuarios->save();
        return response()->json('Usuaio creado con exito!');
    }

    public function show($id)
    {
        $usuario = Usuarios::find($id);
        return response()->json($usuario);
    }

    public function destroy($id)
    {
        $usuario = Usuarios::find($id);
        $usuario->delete();
        return response()->json('Usuario eliminado exitosamente!');
    }

    function login(Request $request)
    {
        $usuario = Usuarios::where("email", $request->email)->first();
        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            return response()->json([
                'status' => 422,
                'message' => 'Datos de usuario erroneos'
            ], 422);
        }
        return response()->json([
            'status' => 200,
            'message' => 'Inicio de sesión exitoso!',
            'data' => [
                'id' => $usuario->id,
                'nombre' => $usuario->nombre,
                'email' => $usuario->email,
                'isAdmin' => $usuario->isAdmin
            ]
        ], 200);
    }
}
