<?php

namespace Database\Factories;

use App\Models\OrigemRelacaoAtributo;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrigemRelacaoAtributoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrigemRelacaoAtributo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'origem_relacao' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
