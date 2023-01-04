<?php

namespace App\Controller\Trip;

use App\UseCase\Trip\FindTripUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class TripFindController extends AbstractController
{

    private FindTripUseCase $findTripUseCase;

    public function __construct(FindTripUseCase $findTripUseCase){
        $this->findTripUseCase = $findTripUseCase;
    }


    public function getTripByUuid(string $id): JsonResponse
    {
        $trip = $this->findTripUseCase->__invoke($id,'id');

        return $this->json([
            'data' => $trip
        ], Response::HTTP_OK);
    }

    public function getTripByPickupPoint(string $id): JsonResponse
    {
        $trip = $this->findTripUseCase->__invoke($id,'pickupPoint');

        return $this->json([
            'data' => $trip
        ], Response::HTTP_OK);
    }

    public function getTripByDestinationPoint(string $id): JsonResponse
    {
        $trip = $this->findTripUseCase->__invoke($id,'destinationPoint');

        return $this->json([
            'data' => $trip
        ], Response::HTTP_OK);
    }

    public function getTripByServiceLocator(string $id): JsonResponse
    {
        $trip = $this->findTripUseCase->__invoke($id,'serviceLocator');

        return $this->json([
            'data' => $trip
        ], Response::HTTP_OK);
    }

    public function getTripByTypeVehicle(string $id): JsonResponse
    {
        $trip = $this->findTripUseCase->__invoke($id,'typeVehicle');

        return $this->json([
            'data' => $trip
        ], Response::HTTP_OK);
    }
}
