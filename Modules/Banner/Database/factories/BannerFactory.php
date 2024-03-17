<?php

namespace Modules\Banner\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \Modules\Banner\Models\Banner;

class BannerFactory extends Factory
{
    protected $model = Banner::class;

    public function definition()
    {
        return [
            "title" => $this->faker->sentence,
            "link" => $this->faker->url,
            "type" => $this->faker->randomElement(Banner::types),
        ];
    }
}

