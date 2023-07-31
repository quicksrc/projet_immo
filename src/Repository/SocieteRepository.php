<?php

namespace App\Repository;

use App\Entity\RechercheSociete;
use App\Entity\Societe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Societe>
 *
 * @method Societe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Societe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Societe[]    findAll()
 * @method Societe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SocieteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Societe::class);
    }

    public function save(Societe $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Societe $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    /**
     * @param RechercheSociete $rechercheSociete
     */
    public function findSocieteBySearch(RechercheSociete $rechercheSociete)
    {
        $qb = $this->createQueryBuilder('s')
            ->where('s.IDSociete IS NOT NULL');

        if (!empty($rechercheSociete->getEtatDossier())) {
            $qb
                ->andWhere('s.EtatDossier LIKE :etatDossier')
                ->setParameter('etatDossier', $rechercheSociete->getEtatDossier());
        }
        if (!empty($rechercheSociete->getResponsable())) {
            $qb
                ->andWhere('s.Responsable LIKE :responsable')
                ->setParameter('responsable', $rechercheSociete->getResponsable());
        }
        if (!empty($rechercheSociete->getOrigineContact())) {
            $qb
                ->andWhere('s.OrigineContact LIKE :origineContact')
                ->setParameter('origineContact', $rechercheSociete->getOrigineContact());
        }
        if (!empty($rechercheSociete->getRaisonSocialeVendeur())) {
            $qb
                ->andWhere('s.VendeurRaisonSociale LIKE :raisonSocialeVendeur')
                ->setParameter('raisonSocialeVendeur', $rechercheSociete->getRaisonSocialeVendeur());
        }
        if (!empty($rechercheSociete->getCpVendeur())) {
            $qb
                ->andWhere('s.VendeurCP LIKE :cpVendeur')
                ->setParameter('cpVendeur', $rechercheSociete->getCpVendeur());
        }
        if (!empty($rechercheSociete->getRaisonSocialeAcheteur())) {
            $qb
                ->andWhere('s.AcheteurRaisonSociale LIKE :raisonSocialeAcheteur')
                ->setParameter('raisonSocialeAcheteur', $rechercheSociete->getRaisonSocialeAcheteur());
        }
        if (!empty($rechercheSociete->getCpAcheteur())) {
            $qb
                ->andWhere('s.AcheteurCP LIKE :cpAcheteur')
                ->setParameter('cpAcheteur', $rechercheSociete->getCpAcheteur());
        }
        return $qb->getQuery()->getResult();
    }


    //    /**
    //     * @return Societe[] Returns an array of Societe objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Societe
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
