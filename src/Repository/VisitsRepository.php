<?php

namespace App\Repository;

use App\Entity\Visits;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Visits>
 *
 * @method Visits|null find($id, $lockMode = null, $lockVersion = null)
 * @method Visits|null findOneBy(array $criteria, array $orderBy = null)
 * @method Visits[]    findAll()
 * @method Visits[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VisitsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Visits::class);
    }

    public function findOneVisitByDate(int $week, int $month, int $year): ?Visits
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.week = :week')
            ->setParameter('week', $week)
            ->andWhere('v.month = :month')
            ->setParameter('month', $month)
            ->andWhere('v.year = :year')
            ->setParameter('year', $year)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function sumAllVisits(): int
    {
        $result = $this->createQueryBuilder('v')
            ->select('SUM(v.visits)')
            ->getQuery()
            ->getSingleScalarResult()
        ;

        return (int) $result;

    }

    public function findOneByWeek(int $week): ?Visits
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.week = :week')
            ->setParameter('week', $week)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

//    /**
//     * @return Visits[] Returns an array of Visits objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Visits
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
