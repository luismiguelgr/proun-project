<?php

namespace App\Controller\Trip;

use App\UseCase\Trip\UpdateTripUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TripEditController extends AbstractController
{

    private UpdateTripUseCase $updateTripUseCase;

    public function __construct(UpdateTripUseCase $updateTripUseCase){
        $this->updateTripUseCase = $updateTripUseCase;
    }

    public function updateTrip(string $id, Request $request): JsonResponse
    {
        try {
            $trip = $this->updateTripUseCase->__invoke($id, $request);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return $this->json([
            'message' => sprintf('Trip %s actualizado correctamente', $trip->getId())
        ], Response::HTTP_OK);
    }
}
