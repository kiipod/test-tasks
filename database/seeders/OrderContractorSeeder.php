<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Contractor;
use App\Models\Order;
use App\Models\OrderContractor;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class OrderContractorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderContractor::factory()->count(5)
            ->state(new Sequence(fn ($sequence) => ['order_id' => Order::all()->random(),
                'contractor_id' => Contractor::all()->random()]))
            ->create();
    }
}
