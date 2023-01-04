<?php

namespace App\Controller\Trip;

use App\UseCase\Trip\CreateTripUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TripCreateController extends AbstractController
{

    private CreateTripUseCase $createTripUseCase;

    public function __construct(CreateTripUseCase $createTripUseCase){
        $this->createTripUseCase = $createTripUseCase;
    }

    public function createTrip(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if(is_null($data)){
            throw new \Exception('Existen parámetros erroneos');
        }

        $this->createTripUseCase->__invoke($data);

        return $this->json([
            'message' => 'Añadido correctamente!'
        ], Response::HTTP_CREATED);
    }
}
