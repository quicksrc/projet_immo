<?php

namespace App\Repository;

use App\Entity\OrigineContactImmeuble;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OrigineContactImmeuble>
 *
 * @method OrigineContactImmeuble|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrigineContactImmeuble|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrigineContactImmeuble[]    findAll()
 * @method OrigineContactImmeuble[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrigineContactImmeubleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrigineContactImmeuble::class);
    }

    public function save(OrigineContactImmeuble $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(OrigineContactImmeuble $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return OrigineContactImmeuble[] Returns an array of OrigineContactImmeuble objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?OrigineContactImmeuble
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
