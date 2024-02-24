<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Admin\Database\factories\AdminFactory;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "password",
        "remember_token"
    ];

    protected static function newFactory()
    {
        return AdminFactory::new();
    }
}
