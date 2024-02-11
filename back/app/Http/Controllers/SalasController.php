<?php

namespace App\Http\Controllers;

use App\Models\Salas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SalasController extends Controller
{
    //
    public function index(Request $request)
    {
        $sala = Salas::all();
        return response()->json($sala);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:1',
            'asientos' => 'required|integer',
            'desde' => 'required|string',
            'hasta' => 'required|string',
            'tipo' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }

        try {
            //code...
            $sala = Salas::create([
                'nombre' => $request->nombre,
                'asientos' => $request->asientos,
                'desde' => $request->desde,
                'hasta' => $request->hasta,
                'tipo' => $request->tipo
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Sala creada con exito!',
                'data' => [
                    'id' => $sala->id,
                    'nombre' => $sala->nombre,
                    'asientos' => $sala->asientos,
                    'desde' => $sala->desde,
                    'hasta' => $sala->hasta,
                    'tipo' => $sala->tipo
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
        $contact = Salas::find($id);
        return response()->json($contact);
    }

    public function destroy($id)
    {
        $sala = Salas::find($id);
        $sala->delete();
        return response()->json("Sala eliminada con exito!");
    }
}
