<?php

namespace App\Controller\Point;

use App\UseCase\Point\ListPointUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PointListController extends AbstractController
{

    private ListPointUseCase $listPointUseCase;

    public function __construct(ListPointUseCase $listPointUseCase){
        $this->listPointUseCase = $listPointUseCase;
    }

    public function getAllPoints(): JsonResponse
    {
        $trips = $this->listPointUseCase->__invoke();

        return $this->json([
            'data' => $trips
        ], Response::HTTP_OK);
    }
}
