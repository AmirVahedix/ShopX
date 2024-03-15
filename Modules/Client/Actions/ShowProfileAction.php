<?php

namespace Modules\Client\Actions;

use App\Contracts\ApiAction;
use Modules\Client\Http\Resources\ClientResource;

class ShowProfileAction implements ApiAction
{
    public function execute()
    {
        return ClientResource::make(auth()->user());
    }
}
