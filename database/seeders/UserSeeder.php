<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Partnership;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(15)
            ->state(new Sequence(fn ($sequence) => ['partnership_id' => Partnership::all()->random()]))
            ->create();
    }
}
