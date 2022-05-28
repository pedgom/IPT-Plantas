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
        Schema::create('densidade_atributo_plantas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('densidade_atributo_id')->constrained()->index('dens_atr_id')->onDelete('cascade');
            $table->foreignId('planta_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['densidade_atributo_id', 'planta_id'])->index('dens_atr_id','planta_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('densidade_atributo_plantas');
    }
};
