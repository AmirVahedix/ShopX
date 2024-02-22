<?php

namespace Modules\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Category\Models\Category;

class CategoryDatabaseSeeder extends Seeder
{
    public function run()
    {
        Category::factory([
            'parent_id' => null
        ])->count(10)->create();

        Category::factory()->count(10)->create();
        Category::factory()->count(10)->create();
        Category::factory()->count(10)->create();
    }
}
