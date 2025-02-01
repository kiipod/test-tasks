<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PartnershipSeeder::class,
            UserSeeder::class,
            OrderTypeSeeder::class,
            OrderSeeder::class,
            ContractorSeeder::class,
            OrderContractorSeeder::class,
            ContractorExOrderTypeSeeder::class,
        ]);
    }
}
