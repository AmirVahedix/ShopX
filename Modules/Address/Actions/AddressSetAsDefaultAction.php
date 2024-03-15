<?php

namespace Modules\Address\Actions;

use App\Contracts\ApiAction;
use App\Exceptions\RecordNotFoundException;
use App\Exceptions\UnauthorizedException;
use Modules\Address\Models\Address;
use Modules\Address\Repositories\AddressRepo;

class AddressSetAsDefaultAction implements ApiAction
{
    /**
     * @throws RecordNotFoundException
     * @throws UnauthorizedException
     */
    public function execute()
    {
        $address = AddressRepo::safeFind(request('id'));

        $address->update([
            'is_default' => true,
        ]);

        Address::query()
            ->where('client_id', auth()->id())
            ->whereNot('id', $address->id)
            ->update([
                'is_default' => false
            ]);

        return [
            'message' => 'Address has been set as default'
        ];
    }
}
