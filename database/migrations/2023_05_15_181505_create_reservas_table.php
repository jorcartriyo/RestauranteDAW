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
        Schema::create('reservas', function (Blueprint $table) {         
            $table->id();
            $table->string('nombre');
            $table->string('email');
            $table->string('telefono');
            $table->dateTime('fecha_reserva');
            $table->unsignedBigInteger('mesa');
            $table->integer('comensales');
            $table->longText('comentarios')->nullable();    
            $table->timestamps();
            $table->foreign('mesa')
            ->references('id')
            ->on('mesas')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
