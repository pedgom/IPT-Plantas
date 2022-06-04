<?php

namespace Database\Factories;

use App\Models\CategoriaAtributoPlanta;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaAtributoPlantaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoriaAtributoPlanta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'categoria_atributo_id' => $this->faker->word,
        'planta_id' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
