<?php


namespace App\Exceptions\Trip;

use Symfony\Component\Config\Definition\Exception\Exception;

class UserAlreadyExistException extends Exception
{
    private const MESSAGE = 'El usuario con email %s ya existe';

    public static function fromEmail(string $email): self
    {
        throw new self(\sprintf(self::MESSAGE, $email));
    }

}