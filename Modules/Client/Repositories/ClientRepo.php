<?php

namespace Modules\Client\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Client\Models\Client;

class ClientRepo
{
    public static function findOrCreate(string $phone): Model
    {
        return Client::query()->firstOrCreate([
            'phone' => $phone
        ]);
    }

    public static function findByPhone(string $phone): Model | null
    {
        return Client::query()
            ->where([ 'phone' => $phone ])
            ->first();
    }
}
