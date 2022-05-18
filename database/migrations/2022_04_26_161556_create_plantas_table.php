<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     * @return void
     */

    //colocar plural no nome das tabelas "plantas"
    public function up()
    {
        //M-N
        Schema::create('categoria_atributos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //M-N
        Schema::create('origem_atributos', function (Blueprint $table) {
            $table->id();
            $table->char('pais', 2);
            $table->char('continente', 2);
            $table->timestamps();
        });

        //M-N
        Schema::create('altura_atributos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //M-N
        Schema::create('diametro_atributos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //M-N
        Schema::create('densidade_atributos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //M-N
        Schema::create('luz_atributos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //M-N
        Schema::create('solo_atributos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //M-N
        Schema::create('phsolo_atributos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //M-N
        Schema::create('agua_atributos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //M-N
        Schema::create('resis_atributos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });


        //1-N
        Schema::create('cor_atributos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });



        //1-N
        Schema::create('descritor_atributos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });


        //1-N   ??????
        Schema::create('situacao_ecologica_atributos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //1-N
        Schema::create('persistencia_atributos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //1-N
        Schema::create('ordem_atributos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //1-N
        Schema::create('familia_atributos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });


        //1-N
        Schema::create('genero_atributos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //1-N
        Schema::create('o_relacao_atributos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //1-N
        Schema::create('usos_atributos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //1-N
        Schema::create('aplicacoes_atributos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //1-N
        Schema::create('colecoes_atributos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //1-N
        Schema::create('especies_zonas_atributos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //1-N
        Schema::create('especies_quercus_atributos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //1-N
        Schema::create('forma_arv_atributos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //1-N
        Schema::create('forma_arb_atributos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //1-N
        Schema::create('forma_herb_atributos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //1-N
        Schema::create('cor_sintese_atributos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //1-N
        Schema::create('estacao_sintese_atributos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('plantas', function (Blueprint $table) {

            $table->id();
            $table->timestamps();                   // data de criaçao

            //IDENTIFICAÇÃO
            $table->string('abreviatura');       //
            $table->string('nome_botanico');    //nome botanico

            $table->string('nome_comum');

            $table->string('tempo_crescimento');
            $table->string('notas');
            $table->string('curiosidades');
            //nome comum

            $table->foreignId('descritor_atributo_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');

            $table->foreignId('ordem_atributo_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');

            $table->foreignId('familia_atributo_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');


            $table->foreignId('genero_atributo_id')
            ->nullable()
                ->constrained()
                ->onDelete('set null');


            $table->foreignId('situacao_ecologica_atributo_id')
            ->nullable()
                ->constrained()
                ->onDelete('set null');

            $table->foreignId('persistencia_atributo_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');

            $table->foreignId('o_relacao_atributo_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');

            $table->foreignId('usos_atributo_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');

            $table->foreignId('aplicacoes_atributo_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');

            $table->foreignId('colecoes_atributo_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');

            $table->foreignId('forma_arv_atributo_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');

            $table->foreignId('forma_arb_atributo_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');

            $table->foreignId('forma_herb_atributo_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');

            $table->foreignId('cor_sintese_atributo_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');

            $table->foreignId('estacao_sintese_atributo_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');

        });

        Schema::create('categoria_atributo_planta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_atributo_id')->constrained()->onDelete('cascade');
            $table->foreignId('planta_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['categoria_atributo_id', 'planta_id']);
        });

        Schema::create('origem_atributo_planta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('origem_atributo_id')->constrained()->onDelete('cascade');
            $table->foreignId('planta_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['origem_atributo_id', 'planta_id']);
        });

        Schema::create('altura_atributo_planta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('altura_atributo_id')->constrained()->onDelete('cascade');
            $table->foreignId('planta_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['altura_atributo_id', 'planta_id']);
        });

        Schema::create('diametro_atributo_planta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('diametro_atributo_id')->constrained()->onDelete('cascade');
            $table->foreignId('planta_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['diametro_atributo_id', 'planta_id']);
        });

        Schema::create('densidade_atributo_planta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('densidade_atributo_id')->constrained()->onDelete('cascade');
            $table->foreignId('planta_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['densidade_atributo_id', 'planta_id']);
        });

        Schema::create('luz_atributo_planta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('luz_atributo_id')->constrained()->onDelete('cascade');
            $table->foreignId('planta_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['luz_atributo_id', 'planta_id']);
        });


        Schema::create('solo_atributo_planta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('solo_atributo_id')->constrained()->onDelete('cascade');
            $table->foreignId('planta_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['solo_atributo_id', 'planta_id']);
        });

        Schema::create('phsolo_atributo_planta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('phsolo_atributo_id')->constrained()->onDelete('cascade');
            $table->foreignId('planta_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['phsolo_atributo_id', 'planta_id']);
        });

        Schema::create('agua_atributo_planta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agua_atributo_id')->constrained()->onDelete('cascade');
            $table->foreignId('planta_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->unique(['agua_atributo_id', 'planta_id']);
        });


        Schema::create('resis_atributo_planta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resis_atributo_id')->constrained()->onDelete('cascade');
            $table->foreignId('planta_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['resis_atributo_id', 'planta_id']);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        //colocar as outras tabelas
        Schema::dropIfExists('plantas');


    }
};


//php artisan infyom:scaffold Client --factory --fromTable --skip=scaffold_requests

//php artisan infyom:model ProductService --fromTable --tableName=product_service
