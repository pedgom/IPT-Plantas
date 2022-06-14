<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     * @return void
     */


    //model por tabela
    // tentar adicionar um planta

    // preencher as tabelas a parte , por exemplo , as ordens, familias, alturas, formas.
    // ligar a tabela plantas às tabelas 1-N
    // ligar a tabela plantas às tableas M-N

    public function up()
    {

        Schema::create('plantas', function (Blueprint $table) {

            $table->id();
            $table->timestamps();                   // data de criaçao
            $table->softDeletes();                  //flag delete


            //IDENTIFICAÇÃO
            $table->string('abreviatura');       //
            $table->string('nome_botanico');    //nome botanico

            $table->string('nome_comum');

            $table->string('tempo_crescimento');
            $table->string('notas');
            $table->string('curiosidades');

            $table->foreignId('persistencia_atributo_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('ordem_atributo_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('familia_atributo_id')->nullable()->constrained()->onDelete('set null');



        });
    }
//comentário do branch Gabriel teste
//comentario Pedro
//conflito

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plantas');
    }
};



//php artisan infyom:scaffold  --factory --fromTable --skip=scaffold_requests

//php artisan infyom:model ProductService --fromTable --tableName=product_service
