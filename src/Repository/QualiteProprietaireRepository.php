<?php

namespace App\Repository;

use App\Entity\QualiteProprietaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<QualiteProprietaire>
 *
 * @method QualiteProprietaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method QualiteProprietaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method QualiteProprietaire[]    findAll()
 * @method QualiteProprietaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QualiteProprietaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QualiteProprietaire::class);
    }

//    /**
//     * @return QualiteProprietaire[] Returns an array of QualiteProprietaire objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('q')
//            ->andWhere('q.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('q.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?QualiteProprietaire
//    {
//        return $this->createQueryBuilder('q')
//            ->andWhere('q.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
