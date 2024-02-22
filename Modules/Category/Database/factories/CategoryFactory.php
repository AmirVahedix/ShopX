<?php

namespace Modules\Category\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \Modules\Category\Models\Category;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        return [
            "title" => $this->faker->sentence,
            "category_id" => $this->faker->randomElement([null, Category::query()->first()->id ?? null]),
        ];
    }
}

