<?php

namespace App\Entity;

abstract class TypeVehicle
{

   private const TYPE_VEHICLE_CAR       ='coche';
   private const TYPE_VEHICLE_PICKUP    ='furgoneta';
   private const TYPE_VEHICLE_SHARED    ='compartido';

   public static function getConstantsList(): array
   {
       return array(
           self::TYPE_VEHICLE_CAR,
           self::TYPE_VEHICLE_PICKUP,
           self::TYPE_VEHICLE_SHARED
       );
   }

    public static function getConstantsListedAsString(): string
    {
        return implode(', ',static::getConstantsList());
    }

   public static function isValidVehicle(string $vehicle): bool
   {
       return in_array($vehicle, static::getConstantsList());
   }
}
