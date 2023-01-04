<?php


namespace App\UseCase\Trip;


use App\Repository\TripRepository;

class DeleteTripUseCase
{

    private TripRepository $tripRepository;

    public function __construct(TripRepository $tripRepository)
    {
        $this->tripRepository = $tripRepository;
    }

    public function __invoke(string $id): void
    {
        $trip = $this->tripRepository->findOneBy(['id' => $id]);
        $this->tripRepository->remove($trip, true);
    }
}