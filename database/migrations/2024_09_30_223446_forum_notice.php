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
        Schema::create('notices', function (Blueprint $table) {
            $table->id(); // Campo de clave primaria
            $table->string('title'); // Título de la noticia
            $table->text('description'); // Contenido de la noticia
            $table->text('content'); // Contenido de la noticia
            $table->string('author'); // Autor de la noticia
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notices'); // Elimina la tabla si se ejecuta la migración en reversa
    }
};
