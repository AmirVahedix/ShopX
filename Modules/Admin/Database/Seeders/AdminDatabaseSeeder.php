<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Admin\Models\Admin;

class AdminDatabaseSeeder extends Seeder
{
    public function run()
    {
        Admin::factory([
            'name' => 'Amir Vahedi',
            'email' => 'AmirVahedix@gmail.com',
            'password' => '$2y$10$QKPMXrqSac90bFVFVSni/u4EYf3FLBkxVraJPNCAB3yhR.t9p9tMK',
        ])->create();
    }
}
