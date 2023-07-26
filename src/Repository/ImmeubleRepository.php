<?php

namespace App\Repository;

use App\Entity\Immeuble;
use App\Entity\RechercheImmeuble;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Query\QueryBuilder as QueryQueryBuilder;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Immeuble>
 *
 * @method Immeuble|null find($id, $lockMode = null, $lockVersion = null)
 * @method Immeuble|null findOneBy(array $criteria, array $orderBy = null)
 * @method Immeuble[]    findAll()
 * @method Immeuble[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImmeubleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Immeuble::class);
    }

    public function save(Immeuble $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Immeuble $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @param RechercheImmeuble $rechercheImmeuble
     */
    public function findImmeubleBySearch(RechercheImmeuble $rechercheImmeuble)
    {
        $qb = $this->createQueryBuilder('i')
            ->where('i.IDImmeuble IS NOT NULL');

        if (!empty($rechercheImmeuble->getRefProprioImmeuble())) {
            $qb
                ->andWhere('i.ReferenceProprio LIKE :refProprioImmeuble')
                ->setParameter('refProprioImmeuble', $rechercheImmeuble->getRefProprioImmeuble());
        }
        if (!empty($rechercheImmeuble->getOrigineContact())) {
            $qb
                ->andWhere('i.OrigineContact LIKE :origineContact')
                ->setParameter('origineContact', $rechercheImmeuble->getOrigineContact());
        }
        if (!empty($rechercheImmeuble->isNcpcf())) {
            $qb
                ->andWhere('i.NCPCF LIKE :ncpcf')
                ->setParameter('ncpcf', $rechercheImmeuble->isNcpcf());
        }
        if (!empty($rechercheImmeuble->isVisite())) {
            $qb
                ->andWhere('i.Visite LIKE :visite')
                ->setParameter('visite', $rechercheImmeuble->isVisite());
        }
        // dd($qb);
        return $qb->getQuery()->getResult();
    }

    //    public function findOneBySomeField($value): ?Immeuble
    //    {
    //        return $this->createQueryBuilder('i')
    //            ->andWhere('i.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
