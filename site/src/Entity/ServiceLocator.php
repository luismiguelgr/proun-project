<?php

namespace App\Entity;

use App\Repository\ServiceLocatorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiceLocatorRepository::class)
 */
class ServiceLocator
{
    private int $id;

    private string $name;

    private Collection $trips;

    public function __construct() {
        $this->trips = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }


}
