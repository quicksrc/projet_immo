<?php

namespace App\Repository;

use App\Entity\ImmeubleContact;
use App\Entity\RechercheContact;
use App\Entity\RechercheImmeuble;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\ORM\EntityManager;
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
    public function findImmeubleByFieldsContact(RechercheImmeuble $rechercheImmeuble): array
    {
        $qb = $this->createQueryBuilder('ic')
            ->addSelect('c')
            ->leftJoin('ic.IDContact', 'c')
            ->addSelect('i')
            ->leftJoin('ic.IDImmeuble', 'i')
            ->where('i.IDImmeuble IS NOT NULL');

        if (!empty($rechercheImmeuble->getNomContact())) {
            $qb
                ->andWhere('c.Nom LIKE :nomContact')
                ->setParameter('nomContact', $rechercheImmeuble->getNomContact());
        }
        if (!empty($rechercheImmeuble->getPrenomContact())) {
            $qb
                ->andWhere('c.Prenom LIKE :prenomContact')
                ->setParameter('prenomContact', $rechercheImmeuble->getPrenomContact());
        }
        if (!empty($rechercheImmeuble->getRCS())) {
            $qb
                ->andWhere('c.RCS LIKE :RCS')
                ->setParameter('RCS', $rechercheImmeuble->getRCS());
        }
        if (!empty($rechercheImmeuble->getEmail())) {
            $qb
                ->andWhere('c.Email LIKE :Email')
                ->setParameter('Email', $rechercheImmeuble->getEmail());
        }
        if (!empty($rechercheImmeuble->getCiviliteContact())) {
            $qb
                ->andWhere('c.Civilite LIKE :civiliteContact')
                ->setParameter('civiliteContact', $rechercheImmeuble->getCiviliteContact());
        }
        // dd($qb);
        return $qb->getQuery()->getResult();
    }

    /**
     * @return ImmeubleContact[] Returns an array of ImmeubleContact objects
     */
    public function findContactByImmeuble(RechercheContact $rechercheContact): array
    {
        $qb = $this->createQueryBuilder('ic')
            ->addSelect('c')
            ->leftJoin('ic.IDContact', 'c')
            ->where('c.IDContact IS NOT NULL')
            ->addSelect('i')
            ->leftJoin('ic.IDImmeuble', 'i');

        if (!empty($rechercheContact->getRefProprioImmeuble())) {
            $qb
                ->andWhere('i.ReferenceProprio LIKE :refProprioImmeuble')
                ->setParameter('refProprioImmeuble', $rechercheContact->getRefProprioImmeuble());
        }
        if (!empty($rechercheContact->getOrigineContactImmeuble())) {
            $qb
                ->andWhere('i.OrigineContact LIKE :origineContactImmeuble')
                ->setParameter('origineContactImmeuble', $rechercheContact->getOrigineContactImmeuble());
        }
        if (!empty($rechercheContact->getNcpcfImmeuble())) {
            $qb
                ->andWhere('i.NCPCF LIKE :ncpcfImmeuble')
                ->setParameter('ncpcfImmeuble', $rechercheContact->getNcpcfImmeuble());
        }
        if (!empty($rechercheContact->getVisiteImmeuble())) {
            $qb
                ->andWhere('i.Visite LIKE :visiteImmeuble')
                ->setParameter('visiteImmeuble', $rechercheContact->getVisiteImmeuble());
        }
        // dd($qb);
        return $qb->getQuery()->getResult();
    }

    /**
     * @param RechercheImmeuble $rechercheImmeuble
     */
    public function findImmeubleBySearch(RechercheImmeuble $rechercheImmeuble)
    {
        $qb = $this->createQueryBuilder('ic')
            ->addSelect('c')
            ->leftJoin('ic.IDContact', 'c')
            ->addSelect('i')
            ->leftJoin('ic.IDImmeuble', 'i')
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
        if (!empty($rechercheImmeuble->getEtatDossier())) {
            $qb
                ->andWhere('i.EtatDossier LIKE :etatDossier')
                ->setParameter('etatDossier', $rechercheImmeuble->getEtatDossier());
        }
        // dd($qb);
        return $qb->getQuery()->getResult();
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
