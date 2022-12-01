<?php

namespace App\Exceptions;

use Exception;

class WrongPasswordConfirmationException extends Exception
{
    public function __construct($key = 'Wrong password confirmation')
    {
        parent::__construct($key);
    }
}
