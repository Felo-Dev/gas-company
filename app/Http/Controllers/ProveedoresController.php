<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Proveedores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ProveedoresController extends Controller
{

    public function index()
    {

        $proveedores = Proveedores::all();
        
        $data = [
            'proveedores' => $proveedores,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function crear(Request $request)
    {
        $validacion = Validator::make($request->all(), [
            'empresa' => 'required|max:100',
            'pais' => 'required|max:90',
            'cif' => 'required|max:9',
           'fecha_alta' => 'required|date',
        ]);

        if($validacion->fails()){
            $data = [
                'status' => 400,
                'errors' => $validacion->errors(),
                'message' => 'Error en algunos campos'
            ];
            return response()->json($data, 400);
        }

        $existingProveedor = Proveedores::where('cif', $request->cif)->first();

        if ($existingProveedor) {
            $data = [
                'status' => 400,
                'message' => 'El registro con el CIF proporcionado ya existe.'
            ];
            return response()->json($data, 400);
        }

        $proveedor = Proveedores::create([
            'empresa' => $request->empresa,
            'pais' => $request->pais,
            'cif' => $request->cif,
            'fecha_alta' => $request->fecha_alta
        ]);

        if(!$proveedor){
            $data = [
                'status' => 400,
                'errors' => $validacion->errors(),
                'message' => 'No se pudo crear el proveedor'
            ];
            return response()->json($data, 400);
        }

        $data = [
            'proveedor' =>$proveedor ,
            'status' => 201
        ];
        return response()->json($data, 201);


    }

    public function buscar($id)
    {
        $proveedor = Proveedores::find($id);

        if(!$proveedor) {
            $data = [
                'status' => 404,
                'message' => 'No se pudo encontrar el proveedor'
            ];
            return response()->json($data, 400);
        }

        $data = [
            'proveedor' => $proveedor,
            'status' => 200
        ];
        return response()->json($data, 200);

    }

    public function borrar($id)
    {

        if(!$id) {
            $data = [
                'status' => 400,
                'message' => 'Se requiere el ID del proveedor'
            ];
            return response()->json($data, 400);
        }
        
        $proveedor = Proveedores::find($id);
        if(!$proveedor) {
            $data = [
                'status' => 404,
                'message' => 'No se pudo encontrar el proveedor'
            ];
            return response()->json($data, 400);
        }

        $proveedor->delete();
        $data = [
            'mensaje' => "Se ha borrado el proveedor correctamente",
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function actualizar(Request $request, $id)
    {
        $proveedor = Proveedores::find($id);
        if(!$proveedor) {
            $data = [
                'status' => 404,
                'message' => 'No se pudo encontrar el proveedor'
            ];
            return response()->json($data, 400);
        }

            $validacion = Validator::make($request->all(), [
            'empresa' => 'required|max:100',
            'pais' => 'required|max:90',
            'cif' => 'required|max:9',
            'fecha_alta' => 'required|date',
        ]);

        if($validacion->fails()){
            $data = [
                'status' => 400,
                'errors' => $validacion->errors(),
                'message' => 'Error en la validacion de los datos'
            ];
            return response()->json($data, 400);
        }

        $proveedor->empresa = $request->empresa;
        $proveedor->pais = $request->pais;
        $proveedor->cif = $request->cif;
        $proveedor->fecha_alta = $request->fecha_alta;
        $proveedor->save();
        $data = [
            'proveedor' => $proveedor,
            'status' => 200
        ];
        return response()->json($data, 200);
        

    }

    public function actualizarParcial( Request $request, $id)
    {
        $proveedor = Proveedores::find($id);
        if(!$proveedor) {
            $data = [
                'status' => 404,
                'message' => 'No se pudo encontrar el proveedor'
            ];
            return response()->json($data, 400);
        }

        $validator = Validator::make($request->all(), [
            'empresa' => 'max:100',
            'pais' => 'max:90',
            'cif' => 'max:9',
            'fecha_alta' => 'date',
        ]);
        if ($validator->fails()) {
            $data = [
                'status' => 400,
                'errors' => $validator->errors(),
                'message' => 'Error en la validacion de los datos'
            ];
            return response()->json($data, 400);
        }

        if($request->has('empresa')){
            $proveedor->empresa = $request->empresa;
        }

        if($request->has('pais')){
            $proveedor->pais = $request->pais;
        }

        if($request->has('cif')){
            $proveedor->cif = $request->cif;
        }

        if($request->has('fecha_alta')){
            $proveedor->fecha_alta = $request->fecha_alta;
        }

        $proveedor->save();
        $data = [
            'proveedor' => $proveedor,
            'status' => 200,
            "mensaje" => "Se ha actualizado el proveedor correctamente"
        ];
        return response()->json($data, 200);

    }
}
