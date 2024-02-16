<?php

namespace Modules\Address\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Address\Database\factories\AddressFactory;
use Modules\Client\Models\Client;

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

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function estate()
    {
        return $this->belongsTo(Estate::class);
    }
}
