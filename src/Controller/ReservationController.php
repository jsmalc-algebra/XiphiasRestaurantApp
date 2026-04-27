<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\ReservationsType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

final class ReservationController extends AbstractController
{
    #[Route('/reserve', name: 'reservation_form')]
    public function index(Request $request, EntityManagerInterface $manager): Response
    {
        $reservation = new Reservation();

        $form = $this->createForm(ReservationsType::class, $reservation);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($reservation);

            $manager->flush();

            return $this->redirectToRoute('reservation_public_details', ['id' => $reservation->getId()]);
        }

        return $this->render('reservation/index.html.twig', [
            'controller_name' => 'ReservationController',
            'form' => $form,
        ]);
    }

    #[Route('/reservation/{id}', name: 'reservation_public_details')]
    public function show($id, ReservationRepository $repository): Response {
        $reservation = $repository->findOneBy(['id' => $id]);

        return $this->render('reservation/show.html.twig', [
            'reservation' => $reservation,
        ]);
    }
}
