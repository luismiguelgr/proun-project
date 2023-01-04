<?php


namespace App\UseCase\Trip;


use App\Repository\TripRepository;

class FindTripUseCase
{

    private TripRepository $tripRepository;

    public function __construct(TripRepository $tripRepository)
    {
        $this->tripRepository = $tripRepository;
    }

    public function __invoke(string $value, string $field): ?array
    {
        return $this->tripRepository->getTripByField($value, $field);
    }
}