<?php

namespace Database\Factories;

use App\Models\Attribute;
use App\Models\Catalog;
use App\Models\CatalogUnits;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttributeFactory extends Factory
{
    protected $model = Attribute::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => random_int(1,3),
            'value' => random_int(10, 100),
            'catalog_id' => Catalog::inRandomOrder()->first()->id,
            'attribute_units_id' => CatalogUnits::inRandomOrder()->first()->id,
        ];
    }
}
