<?php

namespace Modules\Client\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Client\Models\Client;

class ClientDatabaseSeeder extends Seeder
{
    public function run()
    {
        Client::factory()->count(25)->create();
    }
}
