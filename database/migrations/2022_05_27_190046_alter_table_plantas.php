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
        Schema::table('plantas', function (Blueprint $table) {
            //
            $table->foreignId('altura_atributo_planta_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('plantas', function (Blueprint $table) {
            $table->foreignId('altura_atributo_planta_id');
            $table->dropColumn('altura_atributo_planta_id');
        });
    }
};
