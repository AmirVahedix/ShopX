<?php

namespace Modules\Admin\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use \Modules\Admin\Models\Admin;

class AdminFactory extends Factory
{
    protected $model = Admin::class;

    public function definition()
    {
        return [
            "name" => $this->faker->name,
            "email" => $this->faker->email,
            "password" => Hash::make('password'),
        ];
    }
}

