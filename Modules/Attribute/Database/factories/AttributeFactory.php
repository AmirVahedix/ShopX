<?php

namespace Modules\Attribute\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \Modules\Attribute\Models\Attribute;
use Modules\Product\Models\Product;

class AttributeFactory extends Factory
{
    protected $model = Attribute::class;

    public function definition()
    {
        return [
            "product_id" => Product::query()->inRandomOrder()->first(),
            "title" => $this->faker->sentence,
            "value" => $this->faker->sentence,
        ];
    }
}

