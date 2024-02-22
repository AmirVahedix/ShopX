<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Address\Database\Seeders\AddressDatabaseSeeder;
use Modules\Attribute\Database\Seeders\AttributeDatabaseSeeder;
use Modules\Category\Database\Seeders\CategoryDatabaseSeeder;
use Modules\Client\Database\Seeders\ClientDatabaseSeeder;
use Modules\Comment\Database\Seeders\CommentDatabaseSeeder;
use Modules\Product\Database\Seeders\ProductDatabaseSeeder;
use Modules\Variant\Database\Seeders\VariantDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(ClientDatabaseSeeder::class);
        $this->call(AddressDatabaseSeeder::class);
        $this->call(CategoryDatabaseSeeder::class);
        $this->call(ProductDatabaseSeeder::class);
        $this->call(AttributeDatabaseSeeder::class);
        $this->call(VariantDatabaseSeeder::class);
        $this->call(CommentDatabaseSeeder::class);
    }
}
