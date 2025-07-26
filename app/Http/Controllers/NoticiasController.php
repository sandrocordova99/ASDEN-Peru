<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\Noticias;
use Illuminate\Http\Request;

class NoticiasController extends Controller
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
                'titulo' => 'required|string|max:255',
                'descripción' => 'required|string|max:255',
                'imagen' =>'required|string|url|max:255',
                'resumen' => 'required|string|max:255'
            ]);
    
            if($validator -> fails()){
                return response() -> json([
                'message: ' => 'Error al validar datos',
                'status' => 400
            ],400);
            }
    
            $Noticias = Noticias::create([
                // 'id' => $request->id,
                 'titulo' => $request->titulo,
                 'descripción' => $request->descripción,
                 'imagen' => $request->imagen,
                 'resumen' => $request->resumen
             ]);
    
             return response()->json([
                'message' => 'Noticias creado',
                'usuario' => $Noticias -> id,
                'status' => 201,
            ], 201);

        }catch(\Exception $e){

            Log::error('Error creating Noticias: ' . $e->getMessage());
            return response()->json([
                'message' => 'Error en la creación de Noticias',
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

    public function getAllNoticias()
    {
        try{
            $Noticias = Noticias::all();
            return response()->json([
                'Noticias' => $Noticias,
                'status' => 200,
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al obtener Noticias',
                'status' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
