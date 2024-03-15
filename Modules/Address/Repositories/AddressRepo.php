<?php

namespace Modules\Address\Repositories;

use App\Exceptions\RecordNotFoundException;
use App\Exceptions\UnauthorizedException;
use Illuminate\Database\Eloquent\Model;
use Modules\Address\Models\Address;

class AddressRepo
{
    /**
     * @throws RecordNotFoundException
     */
    public static function findById(string $id): Model
    {
        $address = Address::query()->find($id);

        if (!$address) throw new RecordNotFoundException();

        return $address;
    }

    /**
     * @throws RecordNotFoundException
     * @throws UnauthorizedException
     */
    public static function safeFind(string $id)
    {
        $address = self::findById($id);

        if ($address->client_id !== auth()->id()) {
            throw new UnauthorizedException();
        }

        return $address;
    }
}
