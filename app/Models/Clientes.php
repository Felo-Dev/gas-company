<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proveedores;
class Clientes extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellidos',
        'dni',
        'fecha_alta',
        'proveedor_id',
        'calidad_id',
        'precio_compra',
        'precio_venta',
        'beneficio'
    ];
    public function proveedor()
    {
        return $this->belongsTo(Proveedores::class, 'proveedor_id');
    }

    public function calidad()
    {
        return $this->belongsTo(Calidad::class, 'calidad_id');
    }
}
