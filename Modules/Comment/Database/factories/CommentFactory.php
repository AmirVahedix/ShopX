<?php

namespace Modules\Comment\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Client\Models\Client;
use \Modules\Comment\Models\Comment;
use Modules\Product\Models\Product;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            "client_id" => Client::query()->inRandomOrder()->first(),
            "product_id" => Product::query()->inRandomOrder()->first(),
            "text" => $this->faker->paragraph(5),
            "rating" => $this->faker->numberBetween(1, 5),
            "upvote" => $this->faker->numberBetween(0, 50),
            "downvote" => $this->faker->numberBetween(0, 50),
            "approved_at" => $this->faker->randomElement([null, now()])
        ];
    }
}

