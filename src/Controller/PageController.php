<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PageController extends AbstractController
{
    // Page d'accueil
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('page/home.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    // Page contact
    #[Route('/', name: 'app_contact', methods: ['GET'])]
    public function contact(): Response
    {
        return $this->render('page/contact.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    // Page RGPD
    #[Route('/', name: 'app_rgpd', methods: ['GET'])]
    public function rgpd(): Response
    {
        return $this->render('page/rgpd.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    // Page CGU
    #[Route('/', name: 'app_cgu', methods: ['GET'])]
    public function cgu(): Response
    {
        return $this->render('page/cgu.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }
}
