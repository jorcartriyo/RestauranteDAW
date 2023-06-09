<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUsuario');
            $table->TIMESTAMP('fecha')->useCurrent();
            $table->enum('estado',['iniciado','pendiente', 'terminado'])->default('iniciado');
            $table->longText('comentarios')->nullable();    
            $table->timestamps();
            $table->foreign('idUsuario')->references('id')->on('users')->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};