<?php

namespace App\Exceptions;

use Exception;

class WrongPasswordException extends Exception
{
    public function __construct($key = 'Wrong password')
    {
        parent::__construct($key);
    }
}
