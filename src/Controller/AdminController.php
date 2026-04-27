<?php

namespace App\Controller;

use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\ReservationFilterType;
use Symfony\Component\HttpFoundation\Request;

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
}
