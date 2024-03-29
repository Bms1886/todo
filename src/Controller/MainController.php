<?php

namespace App\Controller;

use App\Repository\TodoRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(TodoRepository $todoRepository): Response
    {
        return $this->render('main/home.html.twig', [
            'controller_name' => 'MainController',
            'todos' => $todoRepository->findAll(),
        ]);
    }
}
