<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('category_product', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->unique(['category_id', 'product_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('category_product');
    }
};
