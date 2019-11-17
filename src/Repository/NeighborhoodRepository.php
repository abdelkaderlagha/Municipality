<?php

namespace App\Repository;

use App\Entity\Neighborhood;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Neighborhood|null find($id, $lockMode = null, $lockVersion = null)
 * @method Neighborhood|null findOneBy(array $criteria, array $orderBy = null)
 * @method Neighborhood[]    findAll()
 * @method Neighborhood[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NeighborhoodRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Neighborhood::class);
    }

    // /**
    //  * @return Neighborhood[] Returns an array of Neighborhood objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Neighborhood
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
