<?php

namespace Modules\Client\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Client\Actions\ShowProfileAction;
use Modules\Client\Actions\UpdateProfileAction;
use Modules\Client\Http\Requests\UpdateProfileRequest;
use Modules\Client\Http\Resources\ClientResource;

class ClientController extends Controller
{
    public function show(ShowProfileAction $action)
    {
        return $this->executeApiAction($action);
    }

    public function update(UpdateProfileRequest $request, UpdateProfileAction $action)
    {
        return $this->executeApiAction($action);
    }
}
