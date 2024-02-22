<?php

namespace Modules\Variant\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Product\Models\Product;
use \Modules\Variant\Models\Variant;

class VariantFactory extends Factory
{
    protected $model = Variant::class;

    public function definition()
    {
        return [
            "product_id" => Product::query()->inRandomOrder()->first(),
            "color_name" => $this->faker->colorName,
            "color_hash" => $this->faker->hexColor,
            "warranty" => $this->faker->sentence,
            "price" => $this->faker->numberBetween(2000000, 200000000),
            "old_price" => $this->faker->randomElement([null, $this->faker->numberBetween(2000000, 200000000)]),
            "stock" => $this->faker->numberBetween(0, 10),
        ];
    }
}

