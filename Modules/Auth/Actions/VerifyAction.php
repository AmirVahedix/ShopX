<?php

namespace Modules\Auth\Actions;

use App\Contracts\ApiAction;
use Modules\Auth\Exceptions\InvalidOtpException;
use Modules\Auth\Services\OtpService;
use Modules\Client\Repositories\ClientRepo;

class VerifyAction implements ApiAction
{
    /**
     * @throws InvalidOtpException
     */
    public function execute(): array
    {
        $result = OtpService::verify(request('phone'), request('otp'));

        if (!$result) throw new InvalidOtpException();

        $client = ClientRepo::findByPhone(request('phone'));
        $token = $client->generateAuthToken();

        return [
            'message' => 'client verified',
            'accessToken' => $token
        ];
    }
}
