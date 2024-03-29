<?php

namespace Modules\Address\Actions;

use App\Contracts\ApiAction;
use App\Exceptions\RecordNotFoundException;
use App\Exceptions\UnauthorizedException;
use Modules\Address\Repositories\AddressRepo;

class AddressDeleteAction implements ApiAction
{
    /**
     * @throws RecordNotFoundException
     * @throws UnauthorizedException
     */
    public function execute()
    {
        $address = AddressRepo::safeFind(request('id'));

        $address->delete();

        return [
            'message' => 'address deleted successfully'
        ];
    }
}
