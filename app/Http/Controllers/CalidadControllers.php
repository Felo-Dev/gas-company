<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Calidades;
class CalidadControllers extends Controller
{
     public function index()
     {
         $calidades = Calidades::all();
         return $calidades;
     }
 
     public function crear(Request $request)
     {
        $validacion = Validator::make($request->all(), [
             'nombre' => 'required|string|max:255',
             'precio' => 'required|numeric',
         ]);

         if($validacion->fails()){
            $data = [
                'status' => 400,
                'errors' => $validacion->errors(),
                'message' => 'Error en algunos campos'
            ];
            return response()->json($data, 400);
        }
 
         $calidades = Calidades::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio
        ]);

        if(!$calidades){
            $data = [
                'status' => 400,
                'errors' => $validacion->errors(),
                'message' => 'No se pudo crear la calidad'
            ];
            return response()->json($data, 400);
        }


        $data = [
            'calidad' =>$calidades ,
            'status' => 201
        ];
        return response()->json($data, 201);

     }
 

     public function buscar($id)
     {
         $calidades = Calidades::find($id);
 
         if(!$calidades) {
             $data = [
                 'status' => 404,
                 'message' => 'No se pudo encontrar la calidad'
             ];
             return response()->json($data, 400);
         }
 
         $data = [
             'calidad' => $calidades,
             'status' => 200
         ];
         return response()->json($data, 200);
 
     }
  
     public function edit($id)
     {
         $calidad = Calidades::findOrFail($id);
         return view('calidades.edit', compact('calidad'));
     }
 
     public function actualizar(Request $request, $id)
     {


        $calidad = Calidades::find($id);
        if(!$calidad) {
            $data = [
                'status' => 404,
                'message' => 'No se pudo encontrar el calidad'
            ];
            return response()->json($data, 400);
        }

            $validacion = Validator::make($request->all(), [
                'nombre' => 'required|string|max:255',
                'precio' => 'required|numeric',
        ]);

        if($validacion->fails()){
            $data = [
                'status' => 400,
                'errors' => $validacion->errors(),
                'message' => 'Error en la validacion de los datos'
            ];
            return response()->json($data, 400);
        }

        $calidad->nombre = $request->nombre;
        $calidad->precio = $request->precio;
       
        $calidad->save();
        $data = [
            'calidad' => $calidad,
            'status' => 200
        ];
        return response()->json($data, 200);

     }



     public function actualizarParcial( Request $request, $id)
     {
         $calidad = Calidades::find($id);
         if(!$calidad) {
             $data = [
                 'status' => 404,
                 'message' => 'No se pudo encontrar la calidad'
             ];
             return response()->json($data, 400);
         }
 
         $validator = Validator::make($request->all(), [
            'nombre' => 'max:255',
            'precio' => 'numeric',
         ]);
         if ($validator->fails()) {
             $data = [
                 'status' => 400,
                 'errors' => $validator->errors(),
                 'message' => 'Error en la validacion de los datos'
             ];
             return response()->json($data, 400);
         }
 
         if($request->has('nombre')){
             $calidad->nombre = $request->nombre;
         }
 
         if($request->has('precio')){
             $calidad->precio = $request->precio;
         }
 
       
 
         $calidad->save();
         $data = [
             'calidad' => $calidad,
             'status' => 200,
             "mensaje" => "Se ha actualizado el calidad correctamente"
         ];
         return response()->json($data, 200);
 
     }
 
     public function borrar($id)
     {
 
         if(!$id) {
             $data = [
                 'status' => 400,
                 'message' => 'Se requiere el ID de la calidad'
             ];
             return response()->json($data, 400);
         }
         
         $calidad = Calidades::find($id);
         if(!$calidad) {
             $data = [
                 'status' => 404,
                 'message' => 'No se pudo encontrar la calidad'
             ];
             return response()->json($data, 400);
         }
 
         $calidad->delete();
         $data = [
             'mensaje' => "Se ha borrado la calidad correctamente",
             'status' => 200
         ];
         return response()->json($data, 200);
     }
}
