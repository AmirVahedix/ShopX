<?php

namespace Modules\Address\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Address\Models\Address;

class AddressDatabaseSeeder extends Seeder
{
    public function run()
    {
        Address::factory()->count(25)->create();
    }
}
