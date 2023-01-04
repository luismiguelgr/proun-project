<?php


namespace App\UseCase\User;


use App\Entity\User;
use App\Exceptions\Trip\BadParametersFromUserRegisterException;
use App\Exceptions\Trip\UserAlreadyExistException;
use App\Repository\UserRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CreateUserUseCase
{
    private UserPasswordHasherInterface $passwordHasherFactory;
    private UserRepository $userRepository;

    public function __construct(
        UserPasswordHasherInterface $passwordHasherFactory,
        UserRepository $userRepository
    ){
        $this->passwordHasherFactory = $passwordHasherFactory;
        $this->userRepository        = $userRepository;
    }

    public function __invoke(string $email, string $password): User
    {
        if(empty($password) || empty($email)){
            throw BadParametersFromUserRegisterException::invalidParams();
        }

        if(!empty($this->userRepository->findBy(['email' => $email]))){
            throw UserAlreadyExistException::fromEmail($email);
        }
        $user = new User();
        $user->setEmail($email);
        $hashedPassword = $this->passwordHasherFactory->hashPassword($user, $password);
        $user->setPassword($hashedPassword);

        $this->userRepository->add($user, true);

        return $user;
    }
}