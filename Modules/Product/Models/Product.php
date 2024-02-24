<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Attribute\Models\Attribute;
use Modules\Product\Database\factories\ProductFactory;
use Modules\Variant\Models\Variant;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        "title",
        "slug",
        "model",
        "description",
    ];

    protected static function newFactory()
    {
        return ProductFactory::new();
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Product::class);
    }
}
