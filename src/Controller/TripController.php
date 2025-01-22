<?php

namespace App\Controller;

use App\Repository\TripRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TripController extends AbstractController
{
    #[Route('/trips', name: 'app_trips', methods: ['GET'])]
    public function index(
        TripRepository $tr, // Utilisation des méthodes pour la BDD
        PaginatorInterface $paginator, // Mise en place du package KnpPaginator
        Request $request // Permet de ciblé la page demandé
    ): Response
    {

        $pagination = $paginator->paginate(
            $tr->findAll(), /* query NOT result */
            $request->query->getInt('page', 1), /* page number */
            18 /* limit per page */
        );


        return $this->render('trip/index.html.twig', [
            'trips' => $pagination,
            'title' => 'Trips',
            'description' => 'Les trips disponibles sur la plateforme. 100% Made By You!'
        ]);
    }

    
    #[Route('/trip/{ref}', name: 'app_trip', methods: ['GET'])]
    public function show(TripRepository $tr, string $ref): Response
    {
        $trip = $tr->findOneBy(['ref' => $ref]); //Récupérer 1 trip
        return $this->render('trip/show.html.twig', [
            'trip' => $trip, 
            'title' => $trip->getTitle(),
            'description' => $trip->getDescription() ?? $trip->getTitle(),
        ]);
    }
}


