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
        Schema::create('categoria_atributo_planta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_atributo_id')->constrained()->index('ctg_atr_id')->onDelete('cascade');
            $table->foreignId('planta_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->unique(['categoria_atributo_id', 'planta_id'])->index('ctg_atr_id','planta_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria_atributo_planta');
    }
};
