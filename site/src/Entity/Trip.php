<?php

namespace App\Entity;

use App\Exceptions\Trip\InvalidTypeVehicleException;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="TripRepository::class")
 */
class Trip
{

    private string $id;

    private Point $pickupPoint;

    private Point $destinationPoint;

    private ?ServiceLocator $serviceLocator;

    private string $typeVehicle;

    public function getId(): string
    {
        return $this->id;
    }

    public function getPickupPoint(): ?Point
    {
        return $this->pickupPoint;
    }

    public function setPickupPoint(?Point $pickupPoint): self
    {
        $this->pickupPoint = $pickupPoint;

        return $this;
    }

    public function getDestinationPoint(): ?Point
    {
        return $this->destinationPoint;
    }

    public function setDestinationPoint(?Point $destinationPoint): self
    {
        $this->destinationPoint = $destinationPoint;

        return $this;
    }

    public function getServiceLocator(): ?ServiceLocator
    {
        return $this->serviceLocator;
    }

    public function setServiceLocator(?ServiceLocator $serviceLocator): self
    {
        $this->serviceLocator = $serviceLocator;

        return $this;
    }

    public function getTypeVehicle(): ?string
    {
        return $this->typeVehicle;
    }

    public function setTypeVehicle(string $typeVehicle): self
    {
        if(!TypeVehicle::isValidVehicle($typeVehicle)){
            throw InvalidTypeVehicleException::fromListTypeVehicle();
        }
        $this->typeVehicle = $typeVehicle;

        return $this;
    }
}
