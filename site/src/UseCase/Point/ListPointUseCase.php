<?php


namespace App\UseCase\Point;


use App\Repository\PointRepository;

class ListPointUseCase
{
    private PointRepository $pointRepository;

    public function __construct(PointRepository $pointRepository)
    {
        $this->pointRepository = $pointRepository;
    }

    public function __invoke(): ?array
    {
        return $this->pointRepository->getAllPoints();
    }
}