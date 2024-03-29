<?php

namespace Modules\Auth\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Auth\Actions\AuthAction;
use Modules\Auth\Actions\VerifyAction;
use Modules\Auth\Http\Requests\AuthRequest;
use Modules\Auth\Http\Requests\VerifyRequest;

class AuthController extends Controller
{
    public function auth(AuthRequest $request, AuthAction $action)
    {
        return $this->executeApiAction($action);
    }

    public function verify(VerifyRequest $request, VerifyAction $action)
    {
        return $this->executeApiAction($action);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'All tokens deleted'
        ];
    }
}
