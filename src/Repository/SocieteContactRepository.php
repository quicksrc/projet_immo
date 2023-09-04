<?php

namespace App\Repository;

use App\Entity\RechercheContact;
use App\Entity\RechercheSociete;
use App\Entity\SocieteContact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SocieteContact>
 *
 * @method SocieteContact|null find($id, $lockMode = null, $lockVersion = null)
 * @method SocieteContact|null findOneBy(array $criteria, array $orderBy = null)
 * @method SocieteContact[]    findAll()
 * @method SocieteContact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SocieteContactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SocieteContact::class);
    }

    public function save(SocieteContact $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SocieteContact $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @param RechercheContact $rechercheContact
     */
    public function findContactBySociete(RechercheContact $rechercheContact)
    {
        $qb = $this->createQueryBuilder('sc')
            ->addSelect('c')
            ->leftJoin('sc.IDContact', 'c')
            ->addSelect('s')
            ->leftJoin('sc.IDSociete', 's')
            ->where('s.IDSociete IS NOT NULL');

        if (!empty($rechercheContact->getEtatDossierSociete())) {
            $qb
                ->andWhere('s.EtatDossier LIKE :etatDossierSociete')
                ->setParameter('etatDossierSociete', $rechercheContact->getEtatDossierSociete());
        }
        if (!empty($rechercheContact->getResponsableSociete())) {
            $qb
                ->andWhere('s.Responsable LIKE :responsableSociete')
                ->setParameter('responsableSociete', $rechercheContact->getResponsableSociete());
        }
        if (!empty($rechercheContact->getOrigineContactSociete())) {
            $qb
                ->andWhere('s.OrigineContact LIKE :origineContactSociete')
                ->setParameter('origineContactSociete', $rechercheContact->getOrigineContactSociete());
        }
        if (!empty($rechercheContact->getRaisonSocialeVendeurSociete())) {
            $qb
                ->andWhere('s.VendeurRaisonSociale LIKE :raisonSocialeVendeurSociete')
                ->setParameter('raisonSocialeVendeurSociete', $rechercheContact->getRaisonSocialeVendeurSociete());
        }
        if (!empty($rechercheContact->getCpVendeurSociete())) {
            $qb
                ->andWhere('s.VendeurCP LIKE :cpVendeurSociete')
                ->setParameter('cpVendeurSociete', $rechercheContact->getCpVendeurSociete());
        }
        if (!empty($rechercheContact->getRaisonSocialeAcheteurSociete())) {
            $qb
                ->andWhere('s.AcheteurRaisonSociale LIKE :raisonSocialeAcheteurSociete')
                ->setParameter('raisonSocialeAcheteurSociete', $rechercheContact->getRaisonSocialeAcheteurSociete());
        }
        if (!empty($rechercheContact->getCpAcheteurSociete())) {
            $qb
                ->andWhere('s.AcheteurCP LIKE :cpAcheteurSociete')
                ->setParameter('cpAcheteurSociete', $rechercheContact->getCpAcheteurSociete());
        }
        return $qb->getQuery()->getResult();
    }


    /**
     * @param RechercheSociete $rechercheSociete
     */
    public function findSocieteByContact(RechercheSociete $rechercheSociete)
    {
        $qb = $this->createQueryBuilder('sc')
            ->addSelect('c')
            ->leftJoin('sc.IDContact', 'c')
            ->where('c.IDContact IS NOT NULL')
            ->addSelect('s')
            ->leftJoin('sc.IDSociete', 's');

        if (!empty($rechercheSociete->getCiviliteContact())) {
            $qb
                ->andWhere('c.Civilite LIKE :civiliteContact')
                ->setParameter('civiliteContact', $rechercheSociete->getCiviliteContact());
        }
        if (!empty($rechercheSociete->getNomContact())) {
            $qb
                ->andWhere('c.Nom LIKE :nomContact')
                ->setParameter('nomContact', $rechercheSociete->getNomContact());
        }
        if (!empty($rechercheSociete->getPrenomContact())) {
            $qb
                ->andWhere('c.Prenom LIKE :prenomContact')
                ->setParameter('prenomContact', $rechercheSociete->getPrenomContact());
        }
        if (!empty($rechercheSociete->getAdresseContact())) {
            $qb
                ->andWhere('c.Adresse LIKE :adresseContact')
                ->setParameter('adresseContact', $rechercheSociete->getAdresseContact());
        }
        if (!empty($rechercheSociete->getCpContact())) {
            if (str_contains($rechercheSociete->getCpContact(), ',')) {
                $cpExplode = explode(',', $rechercheSociete->getCpContact());

                $qb
                    ->andWhere('a.CP IN (:cpContact)')
                    ->setParameter('cpContact', $cpExplode);
            } else {
                $qb
                    ->andWhere('c.CP LIKE :cpContact')
                    ->setParameter('cpContact', $rechercheSociete->getCpContact());
            }
        }
        if (!empty($rechercheSociete->getVilleContact())) {
            if (str_contains($rechercheSociete->getVilleContact(), ',')) {
                $cpExplode = explode(',', $rechercheSociete->getVilleContact());

                $qb
                    ->andWhere('a.Ville IN (:villeContact)')
                    ->setParameter('villeContact', $cpExplode);
            } else {
                $qb
                    ->andWhere('c.Ville LIKE :villeContact')
                    ->setParameter('villeContact', $rechercheSociete->getVilleContact());
            }
        }
        if (!empty($rechercheSociete->getFonctionContact())) {
            $qb
                ->andWhere('c.Fonction LIKE :fonctionContact')
                ->setParameter('fonctionContact', $rechercheSociete->getFonctionContact());
        }
        if (!empty($rechercheSociete->getCorrespondantContact())) {
            $qb
                ->andWhere('c.Correspondant LIKE :correspondantContact')
                ->setParameter('correspondantContact', $rechercheSociete->getCorrespondantContact());
        }
        if (!empty($rechercheSociete->getAntiMailingContact())) {
            $qb
                ->andWhere('c.AntiMailing LIKE :antiMailingContact')
                ->setParameter('antiMailingContact', $rechercheSociete->getAntiMailingContact());
        }
        if (!empty($rechercheSociete->getPrincipalContact())) {
            $qb
                ->andWhere('sc.Principal LIKE :principalContact')
                ->setParameter('principalContact', $rechercheSociete->getPrincipalContact());
        }
        if (!empty($rechercheSociete->getSocieteContact())) {
            $qb
                ->andWhere('c.Societe LIKE :societeContact')
                ->setParameter('societeContact', $rechercheSociete->getSocieteContact());
        }
        if (!empty($rechercheSociete->getNpaiContact())) {
            $qb
                ->andWhere('c.NPAI LIKE :npaiContact')
                ->setParameter('npaiContact', $rechercheSociete->getNpaiContact());
        }
        if (!empty($rechercheSociete->getActiviteContact())) {
            $qb
                ->andWhere('c.NPAI LIKE :activiteContact')
                ->setParameter('activiteContact', $rechercheSociete->getActiviteContact());
        }
        if (!empty($rechercheSociete->getRcsContact())) {
            $qb
                ->andWhere('c.RCS LIKE :rcsContact')
                ->setParameter('rcsContact', $rechercheSociete->getRcsContact());
        }
        return $qb->getQuery()->getResult();
    }
    //    /**
    //     * @return SocieteContact[] Returns an array of SocieteContact objects
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

    //    public function findOneBySomeField($value): ?SocieteContact
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
