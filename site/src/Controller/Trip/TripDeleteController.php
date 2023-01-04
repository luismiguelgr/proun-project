<?php

namespace App\Controller\Trip;

use App\UseCase\Trip\DeleteTripUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class TripDeleteController extends AbstractController
{

    private DeleteTripUseCase $deleteTripUseCase;

    public function __construct(DeleteTripUseCase $deleteTripUseCase){
        $this->deleteTripUseCase = $deleteTripUseCase;
    }

    public function deleteTrip(string $id): JsonResponse
    {
        $this->deleteTripUseCase->__invoke($id);

        return $this->json([
            'message'   => 'Borrado correctamente!',
        ], Response::HTTP_OK);
    }
}
