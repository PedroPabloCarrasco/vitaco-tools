<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();

            $table->string('nombre_visitante');
            $table->string('rut')->nullable();
            $table->string('telefono')->nullable();
            $table->text('motivo')->nullable();

            $table->dateTime('fecha_ingreso');
            $table->dateTime('fecha_salida')->nullable();

            $table->uuid('token')->unique();
            $table->string('status')->default('active');

            $table->timestamp('valid_from')->nullable();
            $table->timestamp('valid_until')->nullable();

            $table->timestamp('check_in_at')->nullable();
            $table->timestamp('check_out_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
