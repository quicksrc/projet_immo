<?php

namespace App\Repository;

use App\Entity\RechercheImmeuble;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RechercheImmeuble>
 *
 * @method RechercheImmeuble|null find($id, $lockMode = null, $lockVersion = null)
 * @method RechercheImmeuble|null findOneBy(array $criteria, array $orderBy = null)
 * @method RechercheImmeuble[]    findAll()
 * @method RechercheImmeuble[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RechercheImmeubleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RechercheImmeuble::class);
    }

    public function enregistrer(RechercheImmeuble $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(RechercheImmeuble $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //    /**
    //     * @return RechercheImmeuble[] Returns an array of RechercheImmeuble objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('r.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?RechercheImmeuble
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
