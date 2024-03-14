<?php

namespace Modules\Client\Actions;

use App\Contracts\ApiAction;
use Modules\Auth\Services\OtpService;
use Modules\Client\Repositories\ClientRepo;

class AuthAction implements ApiAction
{
    public function execute(): array
    {
        $phone = request('phone');

        ClientRepo::findOrCreate($phone);

        OtpService::send($phone);

        return [
            'message' => 'otp sent'
        ];
    }
}
