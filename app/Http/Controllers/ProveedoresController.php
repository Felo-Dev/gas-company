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

    public function crear(Request $request){
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


}
