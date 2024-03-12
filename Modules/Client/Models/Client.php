<?php

namespace Modules\Client\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Address\Models\Address;
use Modules\Bookmark\Models\Bookmark;
use Modules\Client\Database\factories\ClientFactory;
use Modules\Order\Models\Order;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "phone",
        "phone_verified_at",
        "ssn",
        "birth_date",
    ];

    protected static function newFactory()
    {
        return ClientFactory::new();
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
}
