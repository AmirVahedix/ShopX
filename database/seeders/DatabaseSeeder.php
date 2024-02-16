<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Client\Database\Seeders\ClientDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(ClientDatabaseSeeder::class);
    }
}
