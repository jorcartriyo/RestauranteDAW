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
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->unsignedBigInteger('categoria');
            $table->longText('descripcion')->nullable();
            $table->float('precio');
            $table->boolean('activo');
            $table->string('tipo');
            $table->boolean('recomendado');
            $table->boolean('agotado')->default('0');            
            $table->string('imagen');
            $table->timestamps();
            $table->foreign('categoria')
                ->references('id')
                ->on('categorias')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulos');
    }
};
