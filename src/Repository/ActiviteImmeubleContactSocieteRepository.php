<?php

namespace App\Repository;

use App\Entity\ActiviteImmeubleContactSociete;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ActiviteImmeubleContactSociete>
 *
 * @method ActiviteImmeubleContactSociete|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActiviteImmeubleContactSociete|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActiviteImmeubleContactSociete[]    findAll()
 * @method ActiviteImmeubleContactSociete[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActiviteImmeubleContactSocieteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActiviteImmeubleContactSociete::class);
    }

    public function save(ActiviteImmeubleContactSociete $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ActiviteImmeubleContactSociete $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ActiviteImmeubleContactSociete[] Returns an array of ActiviteImmeubleContactSociete objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ActiviteImmeubleContactSociete
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
