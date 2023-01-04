<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{

    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to Proun!'
        ]);
    }
}
