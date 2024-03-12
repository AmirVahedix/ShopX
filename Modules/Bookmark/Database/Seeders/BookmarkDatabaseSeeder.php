<?php

namespace Modules\Bookmark\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Bookmark\Models\Bookmark;

class BookmarkDatabaseSeeder extends Seeder
{
    public function run()
    {
        Bookmark::factory()->count(10)->create();
    }
}
