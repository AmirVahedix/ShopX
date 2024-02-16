<?php

namespace Modules\Address\Models;

use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    protected $table = 'estates';

    protected $fillable = [];

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
}
