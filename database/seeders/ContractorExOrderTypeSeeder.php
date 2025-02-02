<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Contractor;
use App\Models\ContractorExOrderType;
use App\Models\OrderType;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ContractorExOrderTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContractorExOrderType::factory()->count(20)
            ->state(new Sequence(fn ($sequence) => ['contractor_id' => Contractor::all()->random(),
                'order_type_id' => OrderType::all()->random()]
            ))->create();
    }
}
