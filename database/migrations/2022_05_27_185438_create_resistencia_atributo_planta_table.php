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
        Schema::create('planta_resistencia_atributos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resistencia_atributo_id')->constrained()->index('resis_atr_id')->onDelete('cascade');
            $table->foreignId('planta_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['resistencia_atributo_id', 'planta_id'])->index('resis_atr_id','planta_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planta_resistencia_atributos');
    }
};
