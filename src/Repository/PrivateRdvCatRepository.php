<?php

namespace App\Repository;

use App\Entity\PrivateRdvCat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PrivateRdvCat|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrivateRdvCat|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrivateRdvCat[]    findAll()
 * @method PrivateRdvCat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrivateRdvCatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrivateRdvCat::class);
    }

    // /**
    //  * @return PrivateRdvCat[] Returns an array of PrivateRdvCat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PrivateRdvCat
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
