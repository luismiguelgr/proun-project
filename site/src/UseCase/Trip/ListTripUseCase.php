<?php


namespace App\UseCase\Trip;


use App\Repository\TripRepository;

class ListTripUseCase
{

    private TripRepository $tripRepository;

    public function __construct(TripRepository $tripRepository)
    {
        $this->tripRepository = $tripRepository;
    }

    public function __invoke(): ?array
    {
        return $this->tripRepository->allTrips();
    }
}