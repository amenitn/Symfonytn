<?php

namespace App\Repository;

use App\Entity\Amenii;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Amenii|null find($id, $lockMode = null, $lockVersion = null)
 * @method Amenii|null findOneBy(array $criteria, array $orderBy = null)
 * @method Amenii[]    findAll()
 * @method Amenii[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AmeniiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Amenii::class);
    }

    // /**
    //  * @return Amenii[] Returns an array of Amenii objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Amenii
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
