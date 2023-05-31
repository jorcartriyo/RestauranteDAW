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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idPedido');
            $table->unsignedBigInteger('idArticulo');
            $table->integer('cantidad');
            $table->timestamps();
            $table->foreign('idPedido')->references('id')->on('pedidos')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('idArticulo')->references('id')->on('articulos')->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
