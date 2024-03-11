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
            "title" => $this->faker->sentence(3),
            "slug" => $this->faker->slug,
            "parent_id" => Category::query()->inRandomOrder()->first() ?? null,
        ];
    }
}

