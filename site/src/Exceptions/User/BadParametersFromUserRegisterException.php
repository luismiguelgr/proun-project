<?php


namespace App\Exceptions\Trip;

use Symfony\Component\Config\Definition\Exception\Exception;

class BadParametersFromUserRegisterException extends Exception
{
    private const MESSAGE = 'Email o password inválidos';

    public static function invalidParams(): self
    {
        throw new self(\sprintf(self::MESSAGE));
    }

}