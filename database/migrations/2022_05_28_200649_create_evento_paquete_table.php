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
        Schema::create('evento_paquete', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')->nullable()->constrained('eventos')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('paquete_id')->nullable()->constrained('paquetes')->cascadeOnUpdate()->nullOnDelete();
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
        Schema::dropIfExists('evento_paquete');
    }
};
