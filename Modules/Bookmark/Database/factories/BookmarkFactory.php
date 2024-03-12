<?php

namespace Modules\Bookmark\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \Modules\Bookmark\Models\Bookmark;
use Modules\Client\Models\Client;
use Modules\Product\Models\Product;

class BookmarkFactory extends Factory
{
    protected $model = Bookmark::class;

    public function definition()
    {
        return [
            "client_id" => Client::query()->inRandomOrder()->first(),
            "product_id" => Product::query()->inRandomOrder()->first()
        ];
    }
}

