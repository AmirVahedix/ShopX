<?php

namespace Modules\Bookmark\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\Bookmark\Models\Bookmark;

class BookmarkRepo
{
    public static function find(string $product_id, string $client_id = null)
    {
        return Bookmark::query()
            ->where('product_id', $product_id)
            ->where('client_id', $client_id ?: auth()->id())
            ->first();
    }

    public static function findByClient(string $id): Collection
    {
        return Bookmark::with('product')
            ->where('client_id', $id)
            ->get();
    }

    public static function addProduct(string $product_id, string $client_id = null): Model
    {
        return Bookmark::query()
            ->firstOrCreate([
                'product_id' => $product_id,
                'client_id' => $client_id ?: auth()->id()
            ]);
    }
}
