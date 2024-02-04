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

    public function update(Request $request, $id)
    {
        $usuario = Usuarios::find($id);

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|min:3|max:10',
            'email' => 'required|email|unique:usuarios|min:11',
            'password' => 'required|min:8|max:15',
            'apellido' => 'string|min:3|max:10',
            'cedula' => 'string|min:7|max:10',
            'direccion' => 'string|min:4',
            'estado' => 'string',
            'ciudad' => 'string|min:4',
            'telefono' => 'string|min:10|max:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            if ($usuario) {
                $request->merge(['password' => Hash::make($request->password)]);
                $usuario->update($request->all());
                return response()->json('Datos de usuario actualizados!');
            } else {
                return response()->json('Usuario no encontrado');
            }
        }
    }

    public function destroy($id)
    {
        $usuario = Usuarios::find($id);
        $usuario->delete();
        return response()->json('Usuario eliminado exitosamente!');
    }

    function login(Request $req)
    {
        $usuario = Usuarios::where("email", $req->email)->first();
        if (!$usuario || !Hash::check($req->password, $usuario->password)) {
            return ["error" => "El correo o contraseña son erroneos"];
        }
        return response()->json([
            'status' => 200,
            'data' => [
                'id' => $usuario->id,
                'nombre' => $usuario->nombre,
                'email' => $usuario->email,
                'isAdmin' => $usuario->isAdmin
            ]
        ]);
    }
}
