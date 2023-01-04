<?php

namespace App\Controller\User;

use App\UseCase\User\CreateUserUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserCreateController extends AbstractController
{

    private CreateUserUseCase $createUserUseCase;

    public function __construct(CreateUserUseCase $createUserUseCase){
        $this->createUserUseCase = $createUserUseCase;
    }

    public function index(Request $request): JsonResponse
    {
        $email    = $request->get('email');
        $password = $request->get('password');

        $this->createUserUseCase->__invoke($email, $password);

        return $this->json([
            'message'   => 'Usuario registrado correctamente',
        ], Response::HTTP_OK);
    }

}
