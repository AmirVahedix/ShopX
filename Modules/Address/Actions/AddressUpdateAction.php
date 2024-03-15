<?php

namespace Modules\Address\Actions;

use App\Contracts\ApiAction;
use App\Exceptions\RecordNotFoundException;
use App\Exceptions\UnauthorizedException;
use Modules\Address\Http\Resource\AddressResource;
use Modules\Address\Repositories\AddressRepo;

class AddressUpdateAction implements ApiAction
{
    /**
     * @throws RecordNotFoundException
     * @throws UnauthorizedException
     */
    public function execute()
    {
        $address = AddressRepo::safeFind(request('id'));

        $address->update(
            request()->only('zone_id', 'estate_id', 'address', 'postal_code', 'receiver_name', 'receiver_phone')
        );

        return AddressResource::make($address);
    }
}
