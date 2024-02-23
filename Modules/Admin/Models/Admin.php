<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admin\Database\factories\AdminFactory;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "password",
    ];

    protected static function newFactory()
    {
        return AdminFactory::new();
    }
}
