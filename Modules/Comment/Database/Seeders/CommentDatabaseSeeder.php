<?php

namespace Modules\Comment\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Comment\Models\Comment;

class CommentDatabaseSeeder extends Seeder
{
    public function run()
    {
        Comment::factory()->count(50)->create();
    }
}
