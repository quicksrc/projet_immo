<?php

namespace App\Repository;

use App\Entity\VendeurSociete;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VendeurSociete>
 *
 * @method VendeurSociete|null find($id, $lockMode = null, $lockVersion = null)
 * @method VendeurSociete|null findOneBy(array $criteria, array $orderBy = null)
 * @method VendeurSociete[]    findAll()
 * @method VendeurSociete[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VendeurSocieteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VendeurSociete::class);
    }

    public function save(VendeurSociete $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(VendeurSociete $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return VendeurSociete[] Returns an array of VendeurSociete objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?VendeurSociete
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
