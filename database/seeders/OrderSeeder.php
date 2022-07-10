<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderCatalog;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::factory(10)->create();
        OrderCatalog::factory(50)->create();
    }
}
