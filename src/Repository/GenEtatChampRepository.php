<?php

namespace App\Repository;

use App\Entity\GenEtatChamp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GenEtatChamp>
 *
 * @method GenEtatChamp|null find($id, $lockMode = null, $lockVersion = null)
 * @method GenEtatChamp|null findOneBy(array $criteria, array $orderBy = null)
 * @method GenEtatChamp[]    findAll()
 * @method GenEtatChamp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GenEtatChampRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GenEtatChamp::class);
    }

    public function save(GenEtatChamp $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(GenEtatChamp $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return GenEtatChamp[] Returns an array of GenEtatChamp objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?GenEtatChamp
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
