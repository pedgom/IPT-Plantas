<?php

namespace Database\Factories;

use App\Models\SituacaoEcologicaAtributo;
use Illuminate\Database\Eloquent\Factories\Factory;

class SituacaoEcologicaAtributoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SituacaoEcologicaAtributo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'situacao_ecologica' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
