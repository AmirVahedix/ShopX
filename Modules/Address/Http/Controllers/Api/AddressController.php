<?php

namespace Modules\Address\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Address\Actions\AddressIndexAction;

class AddressController extends Controller
{
    public function index(AddressIndexAction $action)
    {
        return $this->executeApiAction($action);
    }
}
