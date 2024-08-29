<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('dni')->unique();
            $table->date('fecha_alta');
            $table->unsignedBigInteger('proveedor_id')->nullable();
            $table->unsignedBigInteger('calidad_id')->nullable();
            $table->decimal('precio_compra', 8, 2)->nullable();
            $table->decimal('precio_venta', 8, 2)->nullable();
            $table->decimal('beneficio', 8, 2)->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
