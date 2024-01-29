<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    //
    public function index(Request $request)
    {
        $usuarios = Usuarios::all();
        return response()->json($usuarios);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|min:3|max:20',
            'email' => 'required|email|unique:usuarios|min:11',
            'password' => 'required|string|min:8|max:20',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }

        try {
            $imagen = $request->file('imagen');
            $ext = $imagen->getClientOriginalExtension();
            $imageName = time().".".$ext;
            $imagen->move(public_path().'/profiles_uploads/', $imageName);

            $usuarios = Usuarios::create([
                'nombre' => $request->nombre,
                'imagen' => $imageName,
                'email' => $request->email,
                'password' => $request->password,
                'apellido' => $request->apellido,
                'cedula' => $request->cedula,
                'direccion' => $request->direccion,
                'estado' => $request->estado,
                'ciudad' => $request->ciudad,
                'telefono' => $request->telefono,
                'isAdmin' => $request->isAdmin
            ]);

            // $image = new Usuarios;
            // $image->imagen = $imageName;

            return response()->json([
                'status' => true,
                'message' => 'Usuario creado con exito!',
                'path' => asset('/uploads/'.$imageName),
                'data' => [
                    'id' => $usuarios->id,
                    'imagen' => $imageName,
                    'nombre' => $usuarios->nombre,
                    'email' => $usuarios->email,
                    'apellido' => $usuarios->apellido,
                    'cedula' => $usuarios->cedula,
                    'direccion' => $usuarios->direccion,
                    'estado' => $usuarios->estado,
                    'ciudad' => $usuarios->ciudad,
                    'telefono' => $usuarios->telefono,
                    'isAdmin' => $usuarios->isAdmin,
                ],
            ]);

        } catch (\Exception $e) {
            //throw $th;
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
