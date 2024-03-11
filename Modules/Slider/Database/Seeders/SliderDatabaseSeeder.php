<?php

namespace Modules\Slider\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Slider\Models\Slider;

class SliderDatabaseSeeder extends Seeder
{
    public function run()
    {
        Slider::factory()->count(5)->create();
    }
}
