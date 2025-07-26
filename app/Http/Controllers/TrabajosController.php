<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\Trabajos;
use Illuminate\Support\Facades\Auth;


class TrabajosController extends Controller
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
        dd($request->all()); 

        //
        try {
            $user = Auth::user();

            if (!$user) {
            return response()->json(['message' => 'Usuario no autenticado'], 401);
            }
    
            $validator = Validator::make($request->all(), [
                'titulo' => 'required|string|max:255',
                'color' => 'required|string|size:7',
                'modalidad' => 'required|string|max:255',
                'tipo_trabajo' => 'required|string|max:255',
                'descripcion' => 'required|string|max:255',
                'published_at' => 'nullable|date',
                'cantidad_puestos' => 'required|integer',
                'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validación para imagen

            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Error en la validación de los datos',
                    'errors' => $validator->errors()
                ], 422);
            } 

            
            $Trabajos = Trabajos::create([
                // 'id' => $request->id,
                 'titulo' => $request->titulo,
                 'color' => $request->color ?? '#FFFFFF',
                 'modalidad' => $request->modalidad,
                 'tipo_trabajo' => $request->tipo_trabajo,
                 'descripcion' => $request->descripcion,
                 'cantidad_puestos' => $request->cantidad_puestos,
                 'imagen' => $request->file('imagen') ? $request->file('imagen')->store('trabajos', 'public') : null, // Guardar imagen si se proporciona
             ]);

    
             return response()->json([
                'message' => 'Trabajo creado',
                'usuario' =>$Trabajos -> id,
                'status' => 201,
            ], 201);
             
    
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Error al crear el Trabajo',
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ], 500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $trabajo = Trabajos::find($id);

    if (!$trabajo) {
        abort(404, 'Trabajo no encontrado');
    }

    return view('trabajos.detalleTrabajo', compact('trabajo'));
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
   

    public function getAllWorks()
    {
        // public

        try{
            

            $Trabajos = Trabajos::all();
            return response()->json([
                'Trabajos' => $Trabajos,
                'status' => 200,
            ], 200);
            
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error al obtener Trabajos',
                'status' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }


    }

    






}
