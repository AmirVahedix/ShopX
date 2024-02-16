<?php

namespace Modules\Address\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Address\Database\factories\AddressFactory;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        "client_id",
        "zone_id",
        "estate_id",
        "address",
    ];

    protected static function newFactory()
    {
        return AddressFactory::new();
    }
}
