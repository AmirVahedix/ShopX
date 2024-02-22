<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Order\Database\factories\OrderItemFactory;
use Modules\Product\Models\Product;
use Modules\Variant\Models\Variant;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        "order_id",
        "product_id",
        "variant_id",
        "qty",
        "price",
    ];

    protected static function newFactory()
    {
        return OrderItemFactory::new();
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
