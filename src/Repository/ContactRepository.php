<?php

namespace App\Repository;

use App\Entity\Contact;
use App\Entity\RechercheContact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Contact>
 *
 * @method Contact|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contact|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contact[]    findAll()
 * @method Contact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contact::class);
    }

    public function save(Contact $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Contact $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @param RechercheContact $rechercheContact
     */
    public function findContactBySearch(RechercheContact $rechercheContact)
    {
        $qb = $this->createQueryBuilder('c')
            ->where('c.IDContact IS NOT NULL');

        if (!empty($rechercheContact->getCivilite())) {
            $qb
                ->andWhere('c.Civilite LIKE :civilite')
                ->setParameter('civilite', $rechercheContact->getCivilite());
        }
        if (!empty($rechercheContact->getNom())) {
            $qb
                ->andWhere('c.Nom LIKE :nom')
                ->setParameter('nom', $rechercheContact->getNom());
        }
        if (!empty($rechercheContact->getPrenom())) {
            $qb
                ->andWhere('c.Prenom LIKE :prenom')
                ->setParameter('prenom', $rechercheContact->getPrenom());
        }
        if (!empty($rechercheContact->getAdresseContact())) {
            $qb
                ->andWhere('c.Adresse LIKE :adresseContact')
                ->setParameter('adresseContact', $rechercheContact->getAdresseContact());
        }
        if (!empty($rechercheContact->getCpContact())) {
            $qb
                ->andWhere('c.CP LIKE :cpContact')
                ->setParameter('cpContact', $rechercheContact->getCpContact());
        }
        if (!empty($rechercheContact->getVilleContact())) {
            $qb
                ->andWhere('c.Ville LIKE :villeContact')
                ->setParameter('villeContact', $rechercheContact->getVilleContact());
        }
        if (!empty($rechercheContact->getFonction())) {
            $qb
                ->andWhere('c.Fonction LIKE :fonction')
                ->setParameter('fonction', $rechercheContact->getFonction());
        }
        if (!empty($rechercheContact->getDateNaissance())) {
            $qb
                ->andWhere('c.DateNaissance LIKE :dateNaissance')
                ->setParameter('dateNaissance', $rechercheContact->getDateNaissance()->format('Y-m-d 00:00:00'));
        }
        if (!empty($rechercheContact->getCorrespondant())) {
            $qb
                ->andWhere('c.Correspondant LIKE :correspondant')
                ->setParameter('correspondant', $rechercheContact->getCorrespondant());
        }
        if (!empty($rechercheContact->getAntiMailing())) {
            $qb
                ->andWhere('c.AntiMailing LIKE :antiMailing')
                ->setParameter('antiMailing', $rechercheContact->getAntiMailing());
        }
        if (!empty($rechercheContact->getSocieteContact())) {
            $qb
                ->andWhere('c.Societe LIKE :societeContact')
                ->setParameter('societeContact', $rechercheContact->getSocieteContact());
        }
        if (!empty($rechercheContact->getNpai())) {
            $qb
                ->andWhere('c.NPAI LIKE :npai')
                ->setParameter('npai', $rechercheContact->getNpai());
        }
        if (!empty($rechercheContact->getActiviteContact())) {
            $qb
                ->andWhere('c.activites LIKE :activiteContact')
                ->setParameter('activiteContact', $rechercheContact->getActiviteContact());
        }
        if (!empty($rechercheContact->getRcs())) {
            $qb
                ->andWhere('c.RCS LIKE :rcs')
                ->setParameter('rcs', $rechercheContact->getRcs());
        }
        // dd($qb);
        return $qb->getQuery()->getResult();
    }

    /**
     * @param RechercheContact $rechercheContact
     */
    public function findContactByAdress(RechercheContact $rechercheContact)
    {
        $qb = $this->createQueryBuilder('c')
            ->where('c.IDContact IS NOT NULL');

        if (!empty($rechercheContact->getAdresseAdresse())) {
            $qb
                ->andWhere('c.Adresse LIKE :adresseAdresse')
                ->setParameter('adresseAdresse', $rechercheContact->getAdresseAdresse());
        }
        if (!empty($rechercheContact->getCpAdresse())) {
            $qb
                ->andWhere('c.CP LIKE :cpAdresse')
                ->setParameter('cpAdresse', $rechercheContact->getCpAdresse());
        }
        if (!empty($rechercheContact->getVilleAdresse())) {
            $qb
                ->andWhere('c.Ville LIKE :villeAdresse')
                ->setParameter('villeAdresse', $rechercheContact->getVilleAdresse());
        }
        return $qb->getQuery()->getResult();
    }

    //    /**
    //     * @return Contact[] Returns an array of Contact objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Contact
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
