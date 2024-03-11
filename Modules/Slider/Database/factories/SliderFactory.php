<?php

namespace Modules\Slider\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \Modules\Slider\Models\Slider;

class SliderFactory extends Factory
{
    protected $model = Slider::class;

    public function definition()
    {
        return [
            "title" => $this->faker->sentence,
            "href" => $this->faker->url,
        ];
    }
}

