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
            $table->foreignId('categoria_atributo_planta_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');
        });

        Schema::table('plantas', function (Blueprint $table) {
            //
            $table->foreignId('origem_atributo_planta_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');
        });

        Schema::table('plantas', function (Blueprint $table) {
            //
            $table->foreignId('altura_atributo_planta_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');
        });

        Schema::table('plantas', function (Blueprint $table) {
            //
            $table->foreignId('diametro_atributo_planta_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');
        });


        Schema::table('plantas', function (Blueprint $table) {
            //
            $table->foreignId('densidade_atributo_planta_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');
        });

        Schema::table('plantas', function (Blueprint $table) {
            //
            $table->foreignId('luz_atributo_planta_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');
        });

        Schema::table('plantas', function (Blueprint $table) {
            //
            $table->foreignId('solo_atributo_planta_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');
        });

        Schema::table('plantas', function (Blueprint $table) {
            //
            $table->foreignId('ph_solo_atributo_planta_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');
        });

        Schema::table('plantas', function (Blueprint $table) {
            //
            $table->foreignId('agua_atributo_planta_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');
        });

        Schema::table('plantas', function (Blueprint $table) {
            //
            $table->foreignId('resistencia_atributo_planta_id')
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
            $table->foreignId('categoria_atributo_planta_id');
            $table->dropColumn('categoria_atributo_planta_id');
        });

        Schema::table('plantas', function (Blueprint $table) {
            $table->foreignId('origem_atributo_planta_id');
            $table->dropColumn('origem_atributo_planta_id');
        });

        Schema::table('plantas', function (Blueprint $table) {
            $table->foreignId('altura_atributo_planta_id');
            $table->dropColumn('altura_atributo_planta_id');
        });

        Schema::table('plantas', function (Blueprint $table) {
            $table->foreignId('diametro_atributo_planta_id');
            $table->dropColumn('diametro_atributo_planta_id');
        });

        Schema::table('plantas', function (Blueprint $table) {
            $table->foreignId('densidade_atributo_planta_id');
            $table->dropColumn('densidade_atributo_planta_id');
        });

        Schema::table('plantas', function (Blueprint $table) {
            $table->foreignId('luz_atributo_planta_id');
            $table->dropColumn('luz_atributo_planta_id');
        });

        Schema::table('plantas', function (Blueprint $table) {
            //
            $table->foreignId('solo_atributo_planta_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');
        });

        Schema::table('plantas', function (Blueprint $table) {
            //
            $table->foreignId('ph_solo_atributo_planta_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');
        });

        Schema::table('plantas', function (Blueprint $table) {
            //
            $table->foreignId('agua_atributo_planta_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');
        });

        Schema::table('plantas', function (Blueprint $table) {
            //
            $table->foreignId('resistencia_atributo_planta_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');
        });








    }
};
