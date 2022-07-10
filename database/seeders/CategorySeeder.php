<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Catalog;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(20)->create()->each(function (Category $catalog) {
            $counts = [0, random_int(3,7)];
            $catalog->children()->saveMany(Category::factory(array_rand($counts))->create()->each(function (Category $catalog) {
                $counts = [0, random_int(3,7)];
                $catalog->children()->saveMany(Category::factory(array_rand($counts))->make());
            }));
        });
    }
}
