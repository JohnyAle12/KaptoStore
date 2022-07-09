<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'document_id' => $this->faker->numberBetween($min = 1010000000, $max = 1030000000),
            'name' => $this->faker->name,
            'lastname' => $this->faker->lastName,
            'mobile' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$KL7pyiaIIG8Wl8JtW8kFS.POenUrT7S0MW/tDYpWT6q3MUkWxmiAe', // password 12345678
            'state' => true,
            'remember_token' => Str::random(10),
        ];
    }
}
