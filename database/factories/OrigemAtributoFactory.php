<?php

namespace Database\Factories;

use App\Models\OrigemAtributo;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrigemAtributoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrigemAtributo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pais' => $this->faker->word,
        'continente' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
