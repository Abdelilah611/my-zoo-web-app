<?php

namespace App\Controller;

use App\Repository\OpeningHourRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HabitatsController extends AbstractController
{
    #[Route('/habitats', name: 'app_habitats')]
    public function index(OpeningHourRepository $openingHourRepository): Response
    {
        $page_name = 'habitats';

        return $this->render('zoo-habitats/index.html.twig', [
            'controller_name' => 'HabitatsController',
            'page_name' => $page_name,
            'openingHours' => $openingHourRepository->getSortedOpeningHours(),
        ]);
    }
}
