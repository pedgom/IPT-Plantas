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
        Schema::create('diametro_atributo_planta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('diametro_atributo_id')->constrained()->onDelete('cascade');
            $table->foreignId('planta_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['diametro_atributo_id', 'planta_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diametro_atributo_planta');
    }
};
