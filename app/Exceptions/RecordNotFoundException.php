<?php

namespace App\Exceptions;

use Exception;

class RecordNotFoundException extends Exception
{
    protected $message = 'record not found';
    protected $code = 404;
}
