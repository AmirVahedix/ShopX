<?php

namespace Modules\Comment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Client\Models\Client;
use Modules\Comment\Database\factories\CommentFactory;
use Modules\Product\Models\Product;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        "client_id",
        "product_id",
        "text",
        "rating",
        "upvote",
        "downvote",
        "approved_at"
    ];

    protected static function newFactory()
    {
        return CommentFactory::new();
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
