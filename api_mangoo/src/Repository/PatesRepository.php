<?php

namespace App\Repository;

use App\Entity\Pates;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Pates|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pates|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pates[]    findAll()
 * @method Pates[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pates::class);
    }

    // /**
    //  * @return Pates[] Returns an array of Pates objects
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
    public function findOneBySomeField($value): ?Pates
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
