<?php

namespace App\Http\Controllers;

use App\Models\Peliculas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PeliculasController extends Controller
{
    //
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpeg,png,jpg',
            'descripcion' => 'required|string',
            'duracion' => 'required|string',
            'genero' => 'required|string',
            'estreno' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }
        try {
            //code...

            $img = $request->imagen;
            $ext = $img->getClientOriginalExtension();
            $imageName = time().".".$ext;
            $img->move(public_path().'/uploads/', $imageName);

            Peliculas::create([
                'nombre' => $request->nombre,
                'imagen' => $imageName,
                'descripcion' => $request->descripcion,
                'duracion' => $request->duracion,
                'genero' => $request->genero,
                'estreno' => $request->estreno,
            ]);

            // Storage::disk('public')->put($imageName, file_get_contents($request->image));
            // la imagen se guarda en storage/app/public
            $image = new Peliculas;
            $image->img = $imageName;
            // $image->save();

            return response()->json([
                'status' => true,
                'message' => 'Imagen subida con exito',
                'path' => asset('/uploads/'.$imageName),
                'data' => $image
            ], 200);

        } catch (\Exception $e) {
            //throw $th;
            return response()->json([
                'message' => 'Algo salio mal!'
            ], 500);
        }
    }
}
