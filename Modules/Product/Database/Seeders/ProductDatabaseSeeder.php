<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Product\Models\Product;

class ProductDatabaseSeeder extends Seeder
{
    public function run()
    {
        Product::factory()->count(25)->create();
    }
}
