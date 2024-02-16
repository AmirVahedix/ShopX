<?php

namespace Modules\Client\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Client\Database\factories\ClientFactory;

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
}
