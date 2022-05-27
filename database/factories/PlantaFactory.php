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
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'abreviatura' => $this->faker->word,
        'nome_botanico' => $this->faker->word,
        'nome_comum' => $this->faker->word,
        'tempo_crescimento' => $this->faker->word,
        'notas' => $this->faker->word,
        'curiosidades' => $this->faker->word,
        'altura_atributo_planta_id' => $this->faker->word
        ];
    }
}
