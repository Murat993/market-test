<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $random = 3 === random_int(1,3);
        return [
            'status' => random_int(1,3),
            'username' => $random ? null : $this->faker->unique()->name,
            'email' => $random ? null : $this->faker->unique()->email,
            'user_id' => $random ? User::inRandomOrder()->first()->id : null,
        ];
    }
}
