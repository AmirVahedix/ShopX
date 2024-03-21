<?php

namespace Modules\Auth\Exceptions;

use Exception;

class InvalidOtpException extends Exception
{
    protected $message = 'کد تایید نامعتبر است.';
    protected $code = 403;
}
