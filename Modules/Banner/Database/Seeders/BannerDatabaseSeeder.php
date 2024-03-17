<?php

namespace Modules\Banner\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Banner\Models\Banner;

class BannerDatabaseSeeder extends Seeder
{
    public function run()
    {
        Banner::factory()->count(5)->create();
    }
}
