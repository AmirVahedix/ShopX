<?php

namespace App\Traits;

use App\Scopes\OrderScope;
use Modules\Category\Models\Category;

trait HasOrder
{
    protected function initializeHasOrder()
    {
        $this->fillable[] = 'order';

        static::creating(function ($instance) {
            $instance->order = static::max('order') + 1;
        });

        static::addGlobalScope(new OrderScope());
    }
}
