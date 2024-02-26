<?php

namespace Modules\Product\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Brand\Models\Brand;
use \Modules\Product\Models\Product;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            "title" => $this->faker->sentence,
            "slug" => $this->faker->slug,
            "model" => $this->faker->sentence,
            "description" => $this->faker->paragraph(10),
            "brand_id" => Brand::query()->inRandomOrder()->first()
        ];
    }
}

