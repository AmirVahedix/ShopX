<?php

namespace Modules\Address\Actions;

use App\Contracts\ApiAction;
use App\Exceptions\RecordNotFoundException;
use App\Exceptions\UnauthorizedException;
use Modules\Address\Http\Resource\AddressResource;
use Modules\Address\Repositories\AddressRepo;

class AddressShowAction implements ApiAction
{
    /**
     * @throws RecordNotFoundException
     * @throws UnauthorizedException
     */
    public function execute()
    {
        $address = AddressRepo::safeFind(request('id'));

        return AddressResource::make($address);
    }
}
