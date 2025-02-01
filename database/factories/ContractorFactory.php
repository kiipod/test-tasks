<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Contractor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Contractor>
 */
class ContractorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
            'second_name' => $this->faker->optional()->firstName(),
            'surname' => $this->faker->lastName(),
            'phone' => $this->faker->unique()->phoneNumber(),
        ];
    }
}
