<?php

namespace Database\Factories;

use App\Models\EspecieQuercusAtributo;
use Illuminate\Database\Eloquent\Factories\Factory;

class EspecieQuercusAtributoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EspecieQuercusAtributo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'especie_quercus' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
