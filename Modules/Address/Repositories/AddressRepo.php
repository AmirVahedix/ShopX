<?php

namespace Modules\Address\Repositories;

use App\Exceptions\RecordNotFoundException;
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
}
