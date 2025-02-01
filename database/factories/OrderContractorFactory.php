<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\OrderContractor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<OrderContractor>
 */
class OrderContractorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => $this->faker->randomFloat(2, 50, 5000),
        ];
    }
}
