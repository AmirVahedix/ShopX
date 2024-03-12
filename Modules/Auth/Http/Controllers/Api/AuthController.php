<?php

namespace Modules\Auth\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Auth\Http\Requests\AuthRequest;
use Modules\Client\Actions\AuthAction;

class AuthController extends Controller
{
    public function auth(AuthRequest $request, AuthAction $action)
    {
        return $this->executeApiAction($action);
    }

    public function verify()
    {

    }
}
