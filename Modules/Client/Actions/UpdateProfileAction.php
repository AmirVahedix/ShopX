<?php

namespace Modules\Client\Actions;

use App\Contracts\ApiAction;
use Modules\Client\Http\Resources\ClientResource;
use Morilog\Jalali\Jalalian;

class UpdateProfileAction implements ApiAction
{
    public function execute()
    {
        request()->merge([
            'birth_date' => Jalalian::fromFormat('Y-m-d', request('birth_date'))->toCarbon()
        ]);

        $client = auth()->user();
        $client->update(request()->only('name', 'ssn', 'birth_date'));

        return ClientResource::make($client);
    }
}
