<?php

namespace Modules\Brand\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Brand\Database\factories\BrandFactory;
use Modules\Product\Models\Product;

class Brand extends Model
{
    use HasFactory;

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
