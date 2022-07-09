<?php

namespace Database\Factories;

use App\Models\Balance;
use Illuminate\Database\Eloquent\Factories\Factory;

class BalanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Balance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'investment_id' => \App\Models\Investment::inRandomOrder()->first()->id,
            'type' => $this->faker->randomElement($array = array ('A la alza','A la baja','Estable')),
            'value' => $this->faker->numberBetween($min = -500, $max = 500),
            'description' => $this->faker->text($maxNbChars = 200)
        ];
    }
}
