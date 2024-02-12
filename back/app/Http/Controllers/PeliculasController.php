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
            'imagen' => 'required|image',
            'descripcion' => 'required|string',
            'duracion' => 'required|string',
            'genero' => 'required|string',
            'estreno' => 'required|string'
        ]);

        $messages = [];

        if ($request->nombre == '') {
            # code...
            $messages[] = 'El nombre no puede estar vacio';
        }

        if ($request->descripcion == '') {
            # code...
            $messages[] = 'La descripcion no puede estar vacia';
        }

        if ($request->duracion == '') {
            # code...
            $messages[] = 'La duracion no puede estar vacia';
        }

        if ($request->genero == '') {
            # code...
            $messages[] = 'El genero no puede estar vacia';
        }

        if ($request->estreno == '') {
            # code...
            $messages[] = 'La fecha de estreno no puede estar vacia';
        }

        if ($request->imagen == '') {
            $messages[] = 'La imagen es obligatoria';
        }
        if ($request->imagen != 'jpg, png, jpeg') {
            # code...
            $messages[] = 'La imagen debe ser en formato jpg, jpeg o png';
        }

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $messages
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

            // la imagen se guarda en storage/app/public
            $image = new Peliculas;
            $image->img = $imageName;

            return response()->json([
                'status' => true,
                'message' => 'Pelicula creada con exito!',
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

        } catch (\Exception $th) {
            //throw $th;
            return response()->json([
                'message' => 'Algo salio mal!'
            ], 500);
        }
    }

    public function show($id)
    {
        $contact = Peliculas::find($id);
        if (!$contact) {
            return response()->json([
                'status' => 404,
                'message' => 'Pelicula no encontrada'
            ], 404);
        }
        return response()->json($contact);
    }

    public function getImage($id)
    {
        $pelicula = Peliculas::findOrFail($id);
        $path = public_path('uploads/' . $pelicula->imagen);

        if (!File::exists($path)) {
            return response()->json([
                'status' => 404,
                'message' => 'Imagen no encontrada'
            ], 404);
        }

        return response()->file($path);
    }

    public function destroy($id)
    {
        $pelicula = Peliculas::find($id);
        if (!$pelicula) {
            return response()->json([
                'status' => 404,
                'message' => 'Pelicula no encontrada'
            ], 404);
        }
        $imagePath = public_path().'/uploads/'.$pelicula->imagen;

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $pelicula->delete();

        return response()->json("Pelicula Eliminada!");
    }
}
