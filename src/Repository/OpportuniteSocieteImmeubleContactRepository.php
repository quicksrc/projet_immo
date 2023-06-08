<?php

namespace App\Repository;

use App\Entity\OpportuniteSocieteImmeubleContact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OpportuniteSocieteImmeubleContact>
 *
 * @method OpportuniteSocieteImmeubleContact|null find($id, $lockMode = null, $lockVersion = null)
 * @method OpportuniteSocieteImmeubleContact|null findOneBy(array $criteria, array $orderBy = null)
 * @method OpportuniteSocieteImmeubleContact[]    findAll()
 * @method OpportuniteSocieteImmeubleContact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OpportuniteSocieteImmeubleContactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OpportuniteSocieteImmeubleContact::class);
    }

    public function save(OpportuniteSocieteImmeubleContact $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(OpportuniteSocieteImmeubleContact $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return OpportuniteSocieteImmeubleContact[] Returns an array of OpportuniteSocieteImmeubleContact objects
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

//    public function findOneBySomeField($value): ?OpportuniteSocieteImmeubleContact
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
