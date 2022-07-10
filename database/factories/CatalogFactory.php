<?php

namespace Database\Factories;

use App\Models\Catalog;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CatalogFactory extends Factory
{
    protected $model = Catalog::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name,
            'slug' => $this->faker->unique()->slug(2),
            'description' => $this->faker->realText(150),
            'price' => random_int(3000, 10000),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
