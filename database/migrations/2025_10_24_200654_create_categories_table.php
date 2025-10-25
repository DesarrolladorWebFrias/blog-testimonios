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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');           // Nombre de la categoría
            $table->string('slug')->unique(); // URL amigable única
            $table->foreignId('parent_id')->nullable()->references('id')->on('categories'); // Categorías jerárquicas
            $table->integer('sort')->default(0); // Ordenamiento
            $table->boolean('active');        // Estado activo/inactivo
            $table->text('description')->nullable(); // Descripción     
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
