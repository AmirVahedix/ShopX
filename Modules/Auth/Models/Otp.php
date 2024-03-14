<?php

namespace Modules\Auth\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Client\Models\Client;

class Otp extends Model
{
    use HasFactory;

    protected $fillable = [
        "client_id",
        "otp",
        "expires_at",
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
