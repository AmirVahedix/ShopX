<?php

namespace Modules\Attribute\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Attribute\Database\factories\AttributeFactory;
use Modules\Product\Models\Product;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        "product_id",
        "title",
        "value",
    ];

    protected static function newFactory()
    {
        return AttributeFactory::new();
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
