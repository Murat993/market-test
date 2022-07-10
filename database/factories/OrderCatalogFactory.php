<?php

namespace Database\Factories;

use App\Models\Catalog;
use App\Models\Order;
use App\Models\OrderCatalog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderCatalogFactory extends Factory
{
    protected $model = OrderCatalog::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => Order::inRandomOrder()->first()->id,
            'catalog_id' => Catalog::inRandomOrder()->first()->id,
        ];
    }
}
