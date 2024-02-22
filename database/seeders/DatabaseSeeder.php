<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Address\Database\Seeders\AddressDatabaseSeeder;
use Modules\Attribute\Database\Seeders\AttributeDatabaseSeeder;
use Modules\Category\Database\Seeders\CategoryDatabaseSeeder;
use Modules\Client\Database\Seeders\ClientDatabaseSeeder;
use Modules\Product\Database\Seeders\ProductDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(ClientDatabaseSeeder::class);
        $this->call(AddressDatabaseSeeder::class);
        $this->call(CategoryDatabaseSeeder::class);
        $this->call(ProductDatabaseSeeder::class);
        $this->call(AttributeDatabaseSeeder::class);
    }
}
