<?php

namespace App\Http\Controllers;

use App\Models\Peliculas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class PeliculasController extends Controller
{
    //
    public function index(Request $request)
    {
        $pelicula = Peliculas::all();
        return response()->json($pelicula);
    }

    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpeg,png,jpg',
            'descripcion' => 'required|string|max:300',
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

            $pelicula = Peliculas::create([
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
                'message' => 'Imagen subida con exito!',
                'path' => asset('/uploads/'.$imageName),
                'data' => [
                    'id' => $pelicula->id,
                    'nombre' => $pelicula->nombre,
                    'descripcion' => $pelicula->descripcion,
                    'duracion' => $pelicula->duracion,
                    'genero' => $pelicula->genero,
                    'estreno' => $pelicula->estreno
                ]
            ], 200);

        } catch (\Exception $e) {
            //throw $th;
            return response()->json([
                'message' => 'Algo salio mal!'
            ], 500);
        }
    }

    public function show($id)
    {
        $contact = Peliculas::find($id);
        return response()->json($contact);
    }

    public function destroy($id)
    {
        $pelicula = Peliculas::find($id);
        $imagePath = public_path().'/uploads/'.$pelicula->imagen;

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $pelicula->delete();

        return response()->json("Pelicula Eliminada!");
    }
}
