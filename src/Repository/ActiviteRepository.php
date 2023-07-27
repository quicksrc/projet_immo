<?php

namespace App\Repository;

use App\Entity\Activite;
use App\Entity\RechercheImmeuble;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Activite>
 *
 * @method Activite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Activite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Activite[]    findAll()
 * @method Activite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActiviteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Activite::class);
    }

    public function save(Activite $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Activite $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @param RechercheImmeuble $rechercheImmeuble
     */
    public function findImmeubleByActivity(RechercheImmeuble $rechercheImmeuble)
    {
        $qb = $this->createQueryBuilder('a')
            ->addSelect('i')
            ->leftJoin('a.IDImmeuble', 'i')
            ->where('i.IDImmeuble IS NOT NULL');

        if (!empty($rechercheImmeuble->getDateActivite())) {
            $qb
                ->andWhere('a.DateActivite LIKE :dateActivite')
                ->setParameter('dateActivite', $rechercheImmeuble->getDateActivite()->format('Y-m-d 00:00:00'));
        }
        if (!empty($rechercheImmeuble->getTheme())) {
            $qb
                ->andWhere('a.Theme LIKE :theme')
                ->setParameter('theme', $rechercheImmeuble->getTheme());
        }
        return $qb->getQuery()->getResult();
    }

    //    /**
    //     * @return Activite[] Returns an array of Activite objects
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

    //    public function findOneBySomeField($value): ?Activite
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
