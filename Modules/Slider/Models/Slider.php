<?php

namespace Modules\Slider\Models;

use App\Traits\HasOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Slider\Database\factories\SliderFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Slider extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasOrder;

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
