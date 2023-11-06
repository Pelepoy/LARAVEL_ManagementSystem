<?php

namespace Database\Factories;

use App\Models\Students;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StudentsFactory extends Factory
{
//    protected $model = Students::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'gender' => fake()->randomElement(['Male', 'Female']),
            'age' => fake()->numberBetween($min = 18, $max = 25),
            'email' => fake()->unique()->safeEmail()
        ];
    }
}
