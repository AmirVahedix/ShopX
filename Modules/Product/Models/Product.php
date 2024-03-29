<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Casts\Attribute as AttributeCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Attribute\Models\Attribute;
use Modules\Brand\Models\Brand;
use Modules\Category\Models\Category;
use Modules\Comment\Models\Comment;
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
        "brand_id",
        "is_special_offer",
        "is_best_seller",
    ];

    protected $appends = [
        'price',
        'old_price'
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
        return $this->belongsToMany(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function price(): AttributeCast
    {
        return AttributeCast::get(function () {
            return $this->variants()->min('price');
        });
    }

    public function oldPrice(): AttributeCast
    {
        return AttributeCast::get(function () {
            return $this->variants()->max('old_price');
        });
    }
}
