<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\ReservationFilterType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

final class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(ReservationRepository $repository, Request $request): Response
    {
        $form = $this->createForm(ReservationFilterType::class);
        $form->handleRequest($request);

        $data = $form->getData();
        $reservations = $repository->findFiltered(
            $data['order'] ?? 'ASC',
            $data['date'] ?? null,
            $data['status'] ?? null
        );
        $filterDate = $data['date'] ?? new \DateTime('today');

        return $this->render('admin/index.html.twig', [
            'reservations' => $reservations,
            'filterForm' => $form,
            'totalGuests' => $repository->countGuestsForDate($filterDate),
            'guestDate' => $filterDate,
            'slotTotals' => $repository->getSlotGuestTotals(),
        ]);
    }

    #[Route('/admin/{id}', name: 'admin_reservation_show')]
    public function show(ReservationRepository $repository,$id): Response {
        $reservation = $repository->findOneBy(['id' => $id]);

        return $this->render('admin/show.html.twig', [
            'reservation' => $reservation,
        ]);
    }

    #[Route('/admin/{id}/edit', name: 'admin_reservation_edit')]
    public function edit(Request $request,Reservation $reservation, EntityManagerInterface $manager): Response {
        
    }
}
