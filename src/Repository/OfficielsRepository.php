<?php

namespace App\Repository;

use App\Entity\Officiels;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Officiels|null find($id, $lockMode = null, $lockVersion = null)
 * @method Officiels|null findOneBy(array $criteria, array $orderBy = null)
 * @method Officiels[]    findAll()
 * @method Officiels[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OfficielsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Officiels::class);
    }

    // /**
    //  * @return Officiels[] Returns an array of Officiels objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Officiels
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
