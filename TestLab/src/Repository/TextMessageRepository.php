<?php

namespace App\Repository;

use App\Entity\TextMessage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TextMessage|null find($id, $lockMode = null, $lockVersion = null)
 * @method TextMessage|null findOneBy(array $criteria, array $orderBy = null)
 * @method TextMessage[]    findAll()
 * @method TextMessage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TextMessageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TextMessage::class);
    }

    // /**
    //  * @return TextMessage[] Returns an array of TextMessage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TextMessage
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
