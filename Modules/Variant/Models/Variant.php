<?php

namespace Modules\Variant\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Models\Product;
use Modules\Variant\Database\factories\VariantFactory;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = [
        "product_id",
        "color_name",
        "color_hash",
        "warranty",
        "price",
        "old_price",
        "stock",
    ];

    protected static function newFactory()
    {
        return VariantFactory::new();
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
