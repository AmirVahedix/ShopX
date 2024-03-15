<?php

namespace Modules\Address\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Validation\UnauthorizedException;
use Modules\Address\Actions\AddressDeleteAction;
use Modules\Address\Actions\AddressIndexAction;
use Modules\Address\Actions\AddressShowAction;
use Modules\Address\Actions\AddressUpdateAction;
use Modules\Address\Http\Requests\AddressUpdateRequest;
use Modules\Address\Http\Resource\AddressResource;
use Modules\Address\Models\Address;

class AddressController extends Controller
{
    public function index(AddressIndexAction $action)
    {
        return $this->executeApiAction($action);
    }

    public function show($id, AddressShowAction $action)
    {
        return $this->executeApiAction($action);
    }

    public function update(AddressUpdateRequest $request, $id, AddressUpdateAction $action)
    {
        return $this->executeApiAction($action);
    }

    public function delete($id, AddressDeleteAction $action)
    {
        return $this->executeApiAction($action);
    }
}
