<?php

namespace Modules\Address\Actions;

use App\Contracts\ApiAction;
use Modules\Address\Models\Address;

class AddressStoreAction implements ApiAction
{
    public function execute()
    {
        request()->merge([
            'client_id' => auth()->id()
        ]);

        Address::query()->create(request()->all());

        return [
            'message' => 'address created successfully.'
        ];
    }
}
