<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*
     Crea un nuevo proyecto Laravel utilizando la versión más reciente del framework.
    Configura la conexión a una base de datos MySQL en el archivo de configuración correspondiente.
    Crea una migración para un modelo "Producto" que tenga los siguientes campos: 

    id (clave primaria),
    nombre (cadena), 
    descripción (texto), 
    precio (decimal) y 
    creado_en/actualizado_en (marcas de tiempo).
     */

     public function up()
     {
         Schema::create('categorias', function (Blueprint $table) {
             $table->id();
             $table->string('nombre');
             $table->timestamps();
         });
     }

    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
 