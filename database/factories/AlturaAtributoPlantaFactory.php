<?php

namespace Database\Factories;

use App\Models\AlturaAtributoPlanta;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlturaAtributoPlantaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AlturaAtributoPlanta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'planta_id' => $this->faker->word,
        'altura_atributo_id' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
