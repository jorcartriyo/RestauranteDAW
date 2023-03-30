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
            $table->id('id_usuario_1');
            $table->timestamps('creacion_reserva');
            $table->date('fecha_reserva');
            $table->string('descripcion_reserva');
        });
    }

    Id_Reserva INT AUTO_INCREMENT PRIMARY KEY,
    Creacion_Reservas TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    Id_Usuario_1  VARCHAR(20),
    Fecha Date NOT NULL,
    Numero_Mesa_1 INT,
    Observaciones_ VARCHAR(100),
    N_Comensales INT NOT NULL,
    Confirmada BOOLEAN DEFAULT false,
    CONSTRAINT FK_MESAS_RESERVAS FOREIGN KEY (Numero_Mesa_1) REFERENCES MESAS(Numero_Mesa),
    CONSTRAINT FK_USUARIOS_RESERVAS FOREIGN KEY (Id_Usuario_1) REFERENCES USUARIOS(Usuario)

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
