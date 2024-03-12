<?php

namespace Modules\Client\Actions;

use Modules\Client\Repositories\ClientRepo;

class AuthAction
{
    public function execute()
    {
        $phone = request('phone');
        $client = ClientRepo::findOrCreate($phone);

        // Send SMS

        return response()->json([
            'message' => 'otp sent successfully'
        ]);
    }
}
