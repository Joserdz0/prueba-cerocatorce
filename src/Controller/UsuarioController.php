<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsuarioController extends AbstractController
{
    
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    #[Route('/usuario/{id}', name: 'getUser', methods: ['GET','HEAD'])]
    public function get($id): JsonResponse
    {
        $user = $this->userRepository->findOneBy(['id' => $id]);

        $data = [
            'id' => $user->getId(),
            'name' => $user->getName(),
            'lastname' => $user->getLastname(),
            'age' => $user->getAge(),
            'status' => $user->getStatus(),
        ];

        return new JsonResponse($data, Response::HTTP_OK);
    }
    
    #[Route('/usuario', name: 'Allusers', methods: ['GET','HEAD'])]
    public function getAll(): JsonResponse
    {
        $resultados[] = $this->userRepository->findUsersActivos();
        $resultado = $resultados[0];
        $data = [];

        foreach ($resultado as $user) {
            $data[] = [
                'id' => $user->getId(),
                'name' => $user->getName(),
                'lastname' => $user->getLastname(),
                'age' => $user->getAge(),
                'status' => $user->getStatus(),
            ];
        }

        return new JsonResponse($data, Response::HTTP_OK);

    }
}
