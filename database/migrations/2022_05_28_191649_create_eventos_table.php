<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->nullable()->constrained('users')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('gerente_id')->nullable()->constrained('users')->cascadeOnUpdate()->nullOnDelete();
            $table->string('nombre',50);
            $table->string('direccion',100);
            $table->date('fecha');
            $table->time('hora_inicio');
            $table->time('hora_final');
            $table->string('motivo')->nullable();
            $table->boolean('confirmado');
            $table->boolean('activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
};
