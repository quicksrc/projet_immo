<?php

namespace App\Repository;

use App\Entity\ImmeubleContact;
use App\Entity\RechercheImmeuble;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ImmeubleContact>
 *
 * @method ImmeubleContact|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImmeubleContact|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImmeubleContact[]    findAll()
 * @method ImmeubleContact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImmeubleContactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImmeubleContact::class);
    }

    public function save(ImmeubleContact $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ImmeubleContact $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return ImmeubleContact[] Returns an array of ImmeubleContact objects
     */
    public function findImmeubleByContact(RechercheImmeuble $rechercheImmeuble): array
    {
        return $this->createQueryBuilder('ic')
            ->addSelect('c')
            ->leftJoin('ic.IDContact', 'c')
            ->where('c.Nom LIKE :nomContact')
            ->setParameter('nomContact', $rechercheImmeuble->getNomContact())
            ->addSelect('i')
            ->leftJoin('ic.IDImmeuble', 'i')
            ->getQuery()
            ->getResult();
    }

    //    /**
    //     * @return ImmeubleContact[] Returns an array of ImmeubleContact objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('i')
    //            ->andWhere('i.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('i.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?ImmeubleContact
    //    {
    //        return $this->createQueryBuilder('i')
    //            ->andWhere('i.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
