<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $table = 'zones';

    protected $fillable = [];

    public function estates()
    {
        return $this->hasMany(Estate::class);
    }
}
