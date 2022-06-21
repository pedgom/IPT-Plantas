<?php

namespace Database\Factories;

use App\Models\EspecieZonaAtributo;
use Illuminate\Database\Eloquent\Factories\Factory;

class EspecieZonaAtributoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EspecieZonaAtributo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'especie_zona' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
