<?php

namespace Modules\Brand\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Brand\Database\factories\BrandFactory;
use Modules\Product\Models\Product;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Brand extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        "title",
        "description",
        "order",
    ];

    protected static function newFactory()
    {
        return BrandFactory::new();
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
