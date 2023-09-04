<?php

namespace App\Repository;

use App\Entity\Adresse;
use App\Entity\RechercheContact;
use App\Entity\RechercheImmeuble;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Adresse>
 *
 * @method Adresse|null find($id, $lockMode = null, $lockVersion = null)
 * @method Adresse|null findOneBy(array $criteria, array $orderBy = null)
 * @method Adresse[]    findAll()
 * @method Adresse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdresseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Adresse::class);
    }

    public function save(Adresse $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Adresse $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @param RechercheImmeuble $rechercheImmeuble
     */
    public function findImmeubleByAdress(RechercheImmeuble $rechercheImmeuble)
    {
        $qb = $this->createQueryBuilder('a')
            ->addSelect('i')
            ->leftJoin('a.IDImmeuble', 'i')
            ->where('i.IDImmeuble IS NOT NULL');


        if (!empty($rechercheImmeuble->getNumPrincipal())) {
            $qb
                ->andWhere('a.NumPrincipal LIKE :numPrincipal')
                ->setParameter('numPrincipal', $rechercheImmeuble->getNumPrincipal());
        }
        if (!empty($rechercheImmeuble->getTypeVoie())) {
            $qb
                ->andWhere('a.TypeVoie LIKE :typeVoie')
                ->setParameter('typeVoie', $rechercheImmeuble->getTypeVoie());
        }
        if (!empty($rechercheImmeuble->getNomRue())) {
            $qb
                ->andWhere('a.Adresse LIKE :nomRue')
                ->setParameter('nomRue', $rechercheImmeuble->getNomRue());
        }
        if (!empty($rechercheImmeuble->getCp())) {
            if (str_contains($rechercheImmeuble->getCp(), ',')) {
                $cpExplode = explode(',', $rechercheImmeuble->getCp());

                $qb
                    ->andWhere('a.CP IN (:cp)')
                    ->setParameter('cp', $cpExplode);
            } else {
                $qb
                    ->andWhere('a.CP LIKE :cp')
                    ->setParameter('cp', $rechercheImmeuble->getCp());
            }
        }
        if (!empty($rechercheImmeuble->getVille())) {
            if (str_contains($rechercheImmeuble->getVille(), ',')) {
                $cpExplode = explode(',', $rechercheImmeuble->getVille());

                $qb
                    ->andWhere('a.Ville IN (:ville)')
                    ->setParameter('ville', $cpExplode);
            } else {
                $qb
                    ->andWhere('a.Ville LIKE :ville')
                    ->setParameter('ville', $rechercheImmeuble->getVille());
            }
        }
        // dd($qb);
        return $qb->getQuery()->getResult();
    }

    //    /**
    //     * @return Adresse[] Returns an array of Adresse objects
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

    //    public function findOneBySomeField($value): ?Adresse
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
