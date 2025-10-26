<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones para crear la tabla 'posts'.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();                                   // Crea la clave primaria (ID) autoincremental.
            $table->string('title');                        // Almacena el título del post.
            $table->string('slug')->unique();               // Versión amigable para URL, debe ser única.
            $table->text('exercpt')->nullable();            // Resumen corto del post (opcional).
            $table->longText('content');                    // Almacena el cuerpo completo del post.
            $table->string('feature_image')->nullable();    // Ruta o URL de la imagen principal (opcional).
            $table->boolean('is_featured')->default(false); // Bandera para destacar el post en la web.
            $table->string('type')->default('post');        // Tipo de contenido (ej. 'post', 'page').
            $table->string('status')->default('draft');     // Estado de publicación (ej. 'draft', 'published').
            $table->dateTime('published_at');               // Fecha y hora en que el post se hizo visible.
            $table->foreignId('author_id')->references('id')->on('users'); // Clave foránea al usuario autor.
            $table->foreignId('parent_id')->nullable()->references('id')->on('posts'); // Permite jerarquías de posts (opcional).
            $table->boolean('comment_status')->default(true); // Controla si los comentarios están habilitados.
            $table->integer('sort')->default(0);            // Campo numérico para ordenar los posts manualmente.
            $table->integer('view_count')->default(0);      // Contador de vistas del post.
            $table->timestamps();                           // Agrega columnas 'created_at' y 'updated_at'.
        });
    }

    /**
     * Revierte las migraciones eliminando la tabla 'posts'.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};