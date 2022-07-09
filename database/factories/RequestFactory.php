<?php

namespace Database\Factories;

use App\Models\Request;
use Illuminate\Database\Eloquent\Factories\Factory;

class RequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Request::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'amount' => $this->faker->numberBetween($min = 100, $max = 1000),
            'bank' => $this->faker->creditCardType,
            'account_number' => $this->faker->creditCardNumber,
            'state' => false
        ];
    }
}
