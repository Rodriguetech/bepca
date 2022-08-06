<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GuidelinesController extends AbstractController
{
    #[Route('/guidelines', name: 'app_guidelines')]
    public function index(): Response
    {
        return $this->render('guidelines/index.html.twig', [
            'controller_name' => 'GuidelinesController',
        ]);
    }
}
