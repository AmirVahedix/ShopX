<?php

namespace Modules\Article\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Article\Models\Article;

class ArticleDatabaseSeeder extends Seeder
{
    public function run()
    {
        Article::factory()->count(25)->create();
    }
}
