<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        DB::unprepared(
            file_get_contents(__DIR__ . '/../sql/estates.sql')
        );
    }

    public function down()
    {
        Schema::dropIfExists('estates');
    }
};
