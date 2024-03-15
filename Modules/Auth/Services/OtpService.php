<?php

namespace Modules\Auth\Services;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Jobs\SendOtpNotificationJob;
use Modules\Auth\Models\Otp;
use Modules\Client\Repositories\ClientRepo;

class OtpService
{
    public static function send(string $phone)
    {
        $client = ClientRepo::findByPhone($phone);

        self::store($client);

        SendOtpNotificationJob::dispatch();
    }

    public static function resend($phone): void
    {
        $client = ClientRepo::findByPhone($phone);

        self::clear($client);

        self::send($phone);
    }

    public static function verify(string $phone, string $otp): bool
    {
        if (!$client = ClientRepo::findByPhone($phone)) return false;
        if (!$client_otp = self::findOtp($client)) return false;
        if ($client_otp->otp !== $otp) return false;

        self::clear($client);
        $client->markAsVerified();

        return true;
    }

    /**
     * @param Model $client
     * @return void
     */
    public static function store(Model $client): void
    {
        Otp::query()->create([
            'client_id' => $client->id,
            'otp' => self::generateOtp(),
            'expires_at' => now()->addMinutes(2)
        ]);
    }

    private static function findOtp(Model $client): Model | null
    {
        $otp = Otp::query()
            ->where([ 'client_id' => $client->id ])
            ->orderByDesc('expires_at')
            ->first();

        if (!$otp) return null;

        if (Carbon::parse($otp->expires_at)->isPast()) return null;

        return $otp;
    }

    private static function clear(Model $client)
    {
        Otp::query()->where([
            'client_id' => $client->id
        ])->delete();
    }

    private static function generateOtp(): string
    {
        return mt_rand('1000', '9999');
    }
}
