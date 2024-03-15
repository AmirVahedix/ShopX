<?php

namespace Modules\Client\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function show()
    {
        dd(auth()->user());
    }

    public function update()
    {

    }
}
