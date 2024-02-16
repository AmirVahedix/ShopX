<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Address\Database\Seeders\AddressDatabaseSeeder;
use Modules\Client\Database\Seeders\ClientDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(ClientDatabaseSeeder::class);
        $this->call(AddressDatabaseSeeder::class);
    }
}
