<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InicioController extends AbstractController
{
    #[Route('/', name: 'inicio')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $usuario = $doctrine->getRepository(USER::class)->find(1);
        $usuario = var_dump($usuario);

        return $this->render('home/index.html.twig', [
            'usuario' => $usuario
        ]);
    }
}
