<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\OrderType;
use Illuminate\Database\Seeder;

class OrderTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderTypes = [
            'Погрузка/Разгрузка',
            'Такелажные работы',
            'Уборка',
        ];

        foreach ($orderTypes as $type) {
            OrderType::create(['name' => $type]);
        }
    }
}
