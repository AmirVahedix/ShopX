<?php

namespace Modules\Bookmark\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Bookmark\Database\factories\BookmarkFactory;
use Modules\Client\Models\Client;
use Modules\Product\Models\Product;

class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = [
        "client_id",
        "product_id"
    ];

    protected static function newFactory()
    {
        return BookmarkFactory::new();
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
