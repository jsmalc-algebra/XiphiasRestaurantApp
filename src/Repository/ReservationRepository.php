<?php

namespace App\Repository;

use App\Entity\Reservation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Reservation>
 */
class ReservationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reservation::class);
    }


    public function findFiltered(string $order, ?\DateTime $date, ?string $status): array
    {
        $qb = $this->createQueryBuilder('r');

        if ($date) {
            $qb->andWhere('r.date = :date')
                ->setParameter('date', $date);
        }

        if ($status) {
            $qb->andWhere('r.Reservation_status = :status')
                ->setParameter('status', $status);
        }

        $qb->orderBy('r.date', $order)
            ->addOrderBy('r.Time_slot', $order);

        return $qb->getQuery()->getResult();
    }

    public function countGuestsForDate(\DateTime $date): int
    {
        return (int) $this->createQueryBuilder('r')
            ->select('SUM(r.Party_size)')
            ->where('r.date = :date')
            ->setParameter('date', $date)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function getSlotGuestTotals(): array
    {
        $results = $this->createQueryBuilder('r')
            ->select('r.date, r.Time_slot, r.private_dining, SUM(r.Party_size) as total, COUNT(r.id) as reservationCount')
            ->groupBy('r.date, r.Time_slot, r.private_dining')
            ->getQuery()
            ->getResult();

        $map = [];
        foreach ($results as $row) {
            $key = $row['date']->format('Y-m-d') . '_' . $row['Time_slot']->format('H:i');
            if ($row['private_dining']) {
                $map[$key]['private'] = [
                    'total' => (int) $row['total'],
                    'count' => (int) $row['reservationCount'],
                ];
            } else {
                $map[$key]['regular'] = (int) $row['total'];
            }
        }

        return $map;
    }
//    /**
//     * @return Reservation[] Returns an array of Reservation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Reservation
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
