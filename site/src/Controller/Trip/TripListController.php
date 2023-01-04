<?php

namespace App\Controller\Trip;

use App\UseCase\Point\ListPointUseCase;
use App\UseCase\Trip\ListTripUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class TripListController extends AbstractController
{

    private ListTripUseCase $listTripUseCase;

    public function __construct(ListTripUseCase $listTripUseCase){
        $this->listTripUseCase = $listTripUseCase;
    }

    public function getAllTrips(): JsonResponse
    {
        $trips = $this->listTripUseCase->__invoke();

        return $this->json([
            'data' => $trips
        ], Response::HTTP_OK);
    }
}
