<?php

namespace Database\Factories;

use App\Models\Advt;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvtFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Advt::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(rand(10, 20)),
            'description' => $this->faker->text(rand(20, 40)),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
