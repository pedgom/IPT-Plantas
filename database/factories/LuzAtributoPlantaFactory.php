<?php

namespace Database\Factories;

use App\Models\LuzAtributoPlanta;
use Illuminate\Database\Eloquent\Factories\Factory;

class LuzAtributoPlantaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LuzAtributoPlanta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'luz_atributo_id' => $this->faker->word,
        'planta_id' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
