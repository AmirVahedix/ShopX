<?php

namespace Modules\Attribute\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Attribute\Models\Attribute;

class AttributeDatabaseSeeder extends Seeder
{
    public function run()
    {
        Attribute::factory()->count(100)->create();
    }
}
