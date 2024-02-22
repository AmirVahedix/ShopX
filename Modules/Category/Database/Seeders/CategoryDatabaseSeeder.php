<?php

namespace Modules\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\CategoryDatabaseSeeder\Models\CategoryDatabaseSeeder;

class CategoryDatabaseSeeder extends Seeder
{
    public function run()
    {
        CategoryDatabaseSeeder::factory()->count(25)->create();
    }
}
