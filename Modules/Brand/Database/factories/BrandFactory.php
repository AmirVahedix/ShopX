<?php

namespace Modules\Brand\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \Modules\Brand\Models\Brand;

class BrandFactory extends Factory
{
    protected $model = Brand::class;

    public function definition()
    {
        return [
            "title" => $this->faker->sentence(3),
            "description" => $this->faker->paragraph(6),
        ];
    }
}

