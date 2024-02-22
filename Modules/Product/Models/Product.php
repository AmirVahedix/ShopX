<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Attribute\Models\Attribute;
use Modules\Product\Database\factories\ProductFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "slug",
        "model",
        "description",
        "price",
        "old_price",
    ];

    protected static function newFactory()
    {
        return ProductFactory::new();
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }
}
