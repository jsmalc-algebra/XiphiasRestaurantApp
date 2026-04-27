<?php

namespace App\Controller;

use App\Entity\Reservation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\ReservationsType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

final class ReservationController extends AbstractController
{
    #[Route('/reservations', name: 'reservation_form')]
    public function index(Request $request, EntityManagerInterface $manager): Response
    {
        $reservation = new Reservation();

        $form = $this->createForm(ReservationsType::class, $reservation);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($reservation);

            $manager->flush();

            dd($reservation);
        }

        return $this->render('reservation/index.html.twig', [
            'controller_name' => 'ReservationController',
            'form' => $form,
        ]);
    }
}
