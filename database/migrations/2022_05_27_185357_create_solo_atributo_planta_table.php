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
        Schema::create('planta_solo_atributos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('solo_atributo_id')->constrained()->onDelete('cascade');
            $table->foreignId('planta_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['solo_atributo_id', 'planta_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planta_solo_atributos');
    }
};
