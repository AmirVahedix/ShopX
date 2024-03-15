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
        $address = AddressRepo::findById(request('id'));

        if ($address->client_id !== auth()->id()) {
            throw new UnauthorizedException();
        }

        $address->delete();

        return [
            'message' => 'address deleted successfully'
        ];
    }
}
