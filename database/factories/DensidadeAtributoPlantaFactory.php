<?php

namespace Database\Factories;

use App\Models\DensidadeAtributoPlanta;
use Illuminate\Database\Eloquent\Factories\Factory;

class DensidadeAtributoPlantaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DensidadeAtributoPlanta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'densidade_atributo_id' => $this->faker->word,
        'planta_id' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
