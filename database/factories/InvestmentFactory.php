<?php

namespace Database\Factories;

use App\Models\Investment;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvestmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Investment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'transaction_code' => $this->faker->ean8,
            'asset_type' => $this->faker
                ->randomElement($array = array ('Efectivo','Finca Raiz','Vehículo','Cheque','Ganado','Tecnología')),
            'value' => $this->faker->numberBetween($min = 100, $max = 1000)
        ];
    }
}
