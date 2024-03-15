<?php

namespace Modules\Address\Actions;

use App\Contracts\ApiAction;
use Modules\Address\Http\Resource\AddressResource;

class AddressIndexAction implements ApiAction
{
    public function execute()
    {
        return AddressResource::collection(auth()->user()->addresses);
    }
}
