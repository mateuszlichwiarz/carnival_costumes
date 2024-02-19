<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\OpenHours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OpenHours>
 *
 * @method OpenHours|null find($id, $lockMode = null, $lockVersion = null)
 * @method OpenHours|null findOneBy(array $criteria, array $orderBy = null)
 * @method OpenHours[]    findAll()
 * @method OpenHours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OpenHoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OpenHours::class);
    }

    public function findAllDaysOpenHours(): array
    {
        return (array) $this->createQueryBuilder('o')
            ->setMaxResults(7)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findDayOpenHours(string $day): OpenHours|null
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.day = :day')
            ->setParameter('day', $day)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    
}
