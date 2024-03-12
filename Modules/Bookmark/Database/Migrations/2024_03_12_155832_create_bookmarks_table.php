<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id');
            $table->foreignId('product_id');
            $table->timestamps();

            $table->unique(['client_id', 'product_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookmarks');
    }
};
