<?php

namespace Database\Factories;

use App\Models\Planta;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlantaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Planta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'abreviatura' => $this->faker->word,
        'nome_botanico' => $this->faker->word,
        'nome_comum' => $this->faker->word,
        'tempo_crescimento' => $this->faker->word,
        'notas' => $this->faker->word,
        'curiosidades' => $this->faker->word,
        'descritor_atributo_id' => $this->faker->word,
        'ordem_atributo_id' => $this->faker->word,
        'familia_atributo_id' => $this->faker->word,
        'genero_atributo_id' => $this->faker->word,
        'situacao_ecologica_atributo_id' => $this->faker->word,
        'persistencia_atributo_id' => $this->faker->word,
        'o_relacao_atributo_id' => $this->faker->word,
        'usos_atributo_id' => $this->faker->word,
        'aplicacoes_atributo_id' => $this->faker->word,
        'colecoes_atributo_id' => $this->faker->word,
        'forma_arv_atributo_id' => $this->faker->word,
        'forma_arb_atributo_id' => $this->faker->word,
        'forma_herb_atributo_id' => $this->faker->word,
        'cor_sintese_atributo_id' => $this->faker->word,
        'estacao_sintese_atributo_id' => $this->faker->word
        ];
    }
}
