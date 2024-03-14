<?php

namespace Modules\Auth\Exceptions;

use Exception;

class InvalidOtpException extends Exception
{
    protected $message = 'invalid otp';
    protected $code = 403;
}
