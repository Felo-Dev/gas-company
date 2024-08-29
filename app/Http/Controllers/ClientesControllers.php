<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Models\Proveedores;
    use App\Models\Calidades;
use Illuminate\Support\Facades\Validator;
class ClientesControllers extends Controller
{
    public function index()
    {
        $clientes = Clientes::all();
        
        $data = [
            'Clientes' => $clientes,
            'status' => 200
        ];

        return response()->json($data, 200);

    }

    public function crear(Request $request)
    {
        $validacion = Validator::make($request->all(), [
            'nombre' => 'required|max:100',
            'apellidos' => 'required|max:100',
            'dni' => 'required|max:20|unique:clientes',
            'fecha_alta' => 'required|date',
            'proveedor_id' => 'nullable|exists:proveedores,id',
            'calidad_id' => 'nullable|exists:calidades,id',
            'precio_compra' => 'nullable|numeric',
            'precio_venta' => 'nullable|numeric',
            'beneficio' => 'nullable|numeric',
        ]);

        if($validacion->fails()){
            $data = [
                'status' => 400,
                'errors' => $validacion->errors(),
                'message' => 'Error en algunos campos'
            ];
            return response()->json($data, 400);
        }

        $cliente = Clientes::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'dni' => $request->dni,
            'fecha_alta' => $request->fecha_alta,
            'proveedor_id' => $request->proveedor_id,
            'calidad_id' => $request->calidad_id,
            'precio_compra' => $request->precio_compra,
            'precio_venta' => $request->precio_venta,
            'beneficio' => $request->beneficio
        ]);

        if(!$cliente){
            $data = [
                'status' => 400,
                'errors' => $validacion->errors(),
                'message' => 'No se pudo crear el cliente'
            ];
            return response()->json($data, 400);
        }

        $data = [
            'cliente' => $cliente,
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function buscar($id)
    {

        $cliente = Clientes::find($id);

        if(!$cliente) {
            $data = [
                'status' => 404,
                'message' => 'No se pudo encontrar el cliente'
            ];
            return response()->json($data, 400);
        }

        $data = [
            'cliente' => $cliente,
            'status' => 200
        ];
        return response()->json($data, 200);

    }

    public function borrar($id)
    {
        if(!$id) {
            $data = [
                'status' => 400,
                'message' => 'Se requiere el ID del cliente'
            ];
            return response()->json($data, 400);
        }
        
        $cliente = Clientes::find($id);
        if(!$cliente) {
            $data = [
                'status' => 404,
                'message' => 'No se pudo encontrar el cliente'
            ];
            return response()->json($data, 404);
        }

        $cliente->delete();
        $data = [
            'mensaje' => "Se ha borrado el cliente correctamente",
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function actualizar(Request $request, $id)
    {
        $cliente = Clientes::find($id);
        if(!$cliente) {
            $data = [
                'status' => 404,
                'message' => 'No se pudo encontrar el cliente'
            ];
            return response()->json($data, 404);
        }

        $validacion = Validator::make($request->all(), [
            'nombre' => 'required|max:100',
            'apellidos' => 'required|max:100',
            'dni' => 'required|max:20',
            'fecha_alta' => 'required|date',
            'proveedor_id' => 'nullable|exists:proveedores,id',
            'calidad_id' => 'nullable|exists:calidades,id',
            'precio_compra' => 'nullable|numeric',
            'precio_venta' => 'nullable|numeric',
            'beneficio' => 'nullable|numeric',
        ]);

        if($validacion->fails()){
            $data = [
                'status' => 400,
                'errors' => $validacion->errors(),
                'message' => 'Error en la validación de los datos'
            ];
            return response()->json($data, 400);
        }

        $cliente->update([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'dni' => $request->dni,
            'fecha_alta' => $request->fecha_alta,
            'proveedor_id' => $request->proveedor_id,
            'calidad_id' => $request->calidad_id,
            'precio_compra' => $request->precio_compra,
            'precio_venta' => $request->precio_venta,
            'beneficio' => $request->beneficio
        ]);

        $data = [
            'cliente' => $cliente,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function actualizarParcial(Request $request, $id)
    {
        $cliente = Clientes::find($id);
        if(!$cliente) {
            $data = [
                'status' => 404,
                'message' => 'No se pudo encontrar el cliente'
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'max:100',
            'apellidos' => 'max:100',
            'dni' => 'max:20',
            'fecha_alta' => 'date',
            'proveedor_id' => 'nullable|exists:proveedores,id',
            'calidad_id' => 'nullable|exists:calidades,id',
            'precio_compra' => 'nullable|numeric',
            'precio_venta' => 'nullable|numeric',
            'beneficio' => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            $data = [
                'status' => 400,
                'errors' => $validator->errors(),
                'message' => 'Error en la validación de los datos'
            ];
            return response()->json($data, 400);
        }

        $cliente->update($request->only([
            'nombre',
            'apellidos',
            'dni',
            'fecha_alta',
            'proveedor_id',
            'calidad_id',
            'precio_compra',
            'precio_venta',
            'beneficio'
        ]));

        $data = [
            'cliente' => $cliente,
            'status' => 200,
            'mensaje' => 'Se ha actualizado el cliente correctamente'
        ];
        return response()->json($data, 200);
    }
}