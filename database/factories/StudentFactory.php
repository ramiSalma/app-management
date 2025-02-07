<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'),
            'image' => 'https://i.pravatar.cc/150?img=' . rand(1, 70),
            'phone' => $this->faker->phoneNumber(),
            'age' => $this->faker->numberBetween(18, 30),
            'date_of_birth' => $this->faker->date(),
            'address' => $this->faker->address(),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
        ];
    }
    

}
