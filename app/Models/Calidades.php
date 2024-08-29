<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calidades extends Model
{
    use HasFactory;
      protected $table = 'calidades';

      protected $fillable = [
          'nombre',
          'precio',
      ];
  
      public function proveedores()
      {
          return $this->belongsToMany(Proveedor::class, 'proveedor_calidad')
                      ->withPivot('precio');
      }
  
      public function clientes()
      {
          return $this->hasMany(Cliente::class);
      }
    
}
