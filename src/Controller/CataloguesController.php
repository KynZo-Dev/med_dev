<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CataloguesController extends AbstractController
{
    #[Route('/catalogues', name: 'catalogues')]
    public function index(): Response
    {
        return $this->render('catalogues/index.html.twig', [
            'controller_name' => 'CataloguesController',
        ]);
    }
}
