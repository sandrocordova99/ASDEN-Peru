<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try{
            $validator = Validator::make($request->all(), [
                'id' => 'string|max:255',
                'nombre' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'telefono' =>'required|string|max:255'
            ]);
    
            if($validator -> fails()){
                return response() -> json([
                'message: ' => 'Error al validar datos',
                'nombre: ' => $request->nombre,
                'email: ' => $request->email,
                'telefono:' => $request->telefono,
                'status' => 400
            ],400);
            }
    
            $contacto = Contacto::create([
                // 'id' => $request->id,
                 'nombre' => $request->nombre,
                 'email' => $request->email,
                 'telefono' => $request->telefono
             ]);
    
             return response()->json([
                'message' => 'contacto creado',
                'usuario' => $contacto -> id,
                'status' => 201,
            ], 201);

        }catch(\Exception $e){

            Log::error('Error creating user: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error en la creación de usuario',
                'status' => 500,
                'error' => $e->getMessage()
            ], 500);
        }

        



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //



    }


    public function getAllContactos()
    {
        try{
            $Contacto = Contacto::all();
            return response()->json([
                'Contacto' => $Contacto,
                'status' => 200,
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al obtener Contacto',
                'status' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }

        
    }

    
}
