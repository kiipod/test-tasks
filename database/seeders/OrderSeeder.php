<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderType;
use App\Models\Partnership;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::factory()->count(5)
            ->state(new Sequence(fn ($sequence) => [
                'order_type_id' => OrderType::all()->random(),
                'partnership_id' => Partnership::all()->random(),
                'user_id' => User::all()->random(),
                ]))
            ->create();
    }
}
