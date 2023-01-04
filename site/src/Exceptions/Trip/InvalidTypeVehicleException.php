<?php


namespace App\Exceptions\Trip;

use App\Entity\TypeVehicle;
use Symfony\Component\Config\Definition\Exception\Exception;

class InvalidTypeVehicleException extends Exception
{
    private const MESSAGE = 'Tipo de vehículo no incluido en la lista.';

    public static function fromListTypeVehicle(): self
    {
        throw new self(\sprintf('%s Solamente se admiten los siguientes: %s',self::MESSAGE, TypeVehicle::getConstantsListedAsString()));
    }

}