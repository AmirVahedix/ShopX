<?php

namespace Modules\Slider\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Slider\Database\factories\SliderFactory;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "href",
        "order",
    ];

    protected static function newFactory()
    {
        return SliderFactory::new();
    }
}
