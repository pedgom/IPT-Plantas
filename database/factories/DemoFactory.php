<?php

namespace Database\Factories;

use App\Models\Demo;
use Illuminate\Database\Eloquent\Factories\Factory;

class DemoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Demo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'demo_id' => null,
            'user_id' => null,
            'name' => $this->faker->name,
            'body' => $this->faker->text,
            'optional' => $this->faker->word,
            'body_optional' => $this->faker->text,
            'value' => $this->faker->randomFloat(2),
            'date' => $this->faker->date('Y-m-d'),
            'datetime' => $this->faker->date('Y-m-d H:i:s'),
            'checkbox' => $this->faker->boolean,
            'privacy_policy' => $this->faker->boolean,
            'status' => $this->faker->numberBetween(1,3),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
