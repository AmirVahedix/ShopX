<?php

namespace Modules\Client\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Client\Http\Resources\ClientResource;

class ClientController extends Controller
{
    public function show()
    {
        return ClientResource::make(auth()->user());
    }

    public function update()
    {

    }
}
