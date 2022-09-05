<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlantasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plantas')->insert([
            [
                'abreviatura' => 'Aare',
                'nome_comum' => 'Amófila',
                'nome_botanico' => 'Ammophila arenaria',
                'tempo_crescimento' => 'Médio',
                'notas' => 'sem notas',
                'curiosidades' => 'As raizes podem chegar a 5m de profundidade, ajudando a reter areia. Antigamente as folhas eram utilizadas para contruir cestos e vassouras e os caules subterrâneaos para fabricar cordas e tapetes',
                'persistencia_atributo_id' => 1,
                'ordem_atributo_id' => 1,
                'familia_atributo_id' => 1,
                'genero_atributo_id' => 1,
                'forma_arbusto_atributo_id' => 1,
                'descritor_atributo_id' => 1,
                'uso_atributo_id' => 1,
                'origem_relacao_atributo_id' => 1,
                'forma_arvore_atributo_id' => 1,
                'colecao_atributo_id' => 1,
                'forma_herbacea_atributo_id' => 1,
                'cor_sintese_atributo_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ]);
    }
}
