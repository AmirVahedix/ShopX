<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Auth\Models\Auth;

class AuthDatabaseSeeder extends Seeder
{
    public function run()
    {
        Auth::factory()->count(25)->create();
    }
}
