<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{


    public function definition()
    {
        return [
            'transaction_title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['successful', 'declined',]),
            'total_amount' => $this->faker->randomFloat(0, 100000, 3),
            'transaction_number' => $this->faker->unique()->numerify('TRX#####'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
