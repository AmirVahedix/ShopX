<?php

namespace Modules\Article\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \Modules\Article\Models\Article;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition()
    {
        return [
            "title" => $this->faker->sentence,
            "slug" => $this->faker->slug,
            "body" => $this->faker->paragraph(6),
            "meta_title" => $this->faker->sentence,
            "meta_description" => $this->faker->paragraph,
            "views" => $this->faker->numberBetween(0, 1000),
            "published_at" => $this->faker->dateTime,
            "reading_time" => $this->faker->numberBetween(1, 10)
        ];
    }
}

