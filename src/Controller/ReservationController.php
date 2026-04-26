<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\ReservationsType;

final class ReservationController extends AbstractController
{
    #[Route('/reservations', name: 'reservation_form')]
    public function index(): Response
    {
        $form = $this->createForm(ReservationsType::class);

        return $this->render('reservation/index.html.twig', [
            'controller_name' => 'ReservationController',
            'form' => $form,
        ]);
    }
}
