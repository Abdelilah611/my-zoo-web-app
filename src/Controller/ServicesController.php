<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ServicesController extends AbstractController
{
    #[Route('/services', name: 'app_services')]
    public function index(): Response
    {
        $page_name = 'services';
        return $this->render('zoo-services/index.html.twig', [
            'controller_name' => 'ServicesController',
            'page_name' => $page_name,
        ]);
    }
}
