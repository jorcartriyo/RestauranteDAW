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
        Schema::create('carrito', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idPedido');
            $table->unsignedBigInteger('idArticulo');    
            $table->integer('cantidad'); 
            $table->integer('precio');       
            $table->timestamps();
            $table->foreign('idPedido')->references('id')->on('pedidos');
            $table->foreign('idArticulo')->references('id')->on('articulos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrito');
    }
};
