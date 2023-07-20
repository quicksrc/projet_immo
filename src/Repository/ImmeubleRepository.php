<?php

namespace App\Repository;

use App\Entity\Immeuble;
use App\Entity\RechercheImmeuble;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
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
    public function findBySearch(RechercheImmeuble $rechercheImmeuble)
    {
        // $data = $this->createQueryBuilder('i')
        //     ->where('i.IDImmeuble LIKE :IDImmeuble')
        //     ->setParameter('IDImmeuble', 'En cours')
        //     ->addOrderBy('i.DateEnquete', 'DESC');

        // if (!empty($rechercheImmeuble->getSuiviPar())) {
        //     $data = $data
        //         ->andWhere('i.SuiviPar LIKE :suiviPar')
        //         ->setParameter('suiviPar', "%{$rechercheImmeuble->getSuiviPar()}%");
        // }

        // $data = $data
        //     ->getQuery()
        //     ->getResult();

        // return $data;

        // for ($i = 0; $i < 10; $i++) {
        //     if (!empty($rechercheImmeuble->getRefProprioImmeuble())) {

        //     }
        // };

        if (!empty($rechercheImmeuble->getSuiviPar()) && !empty($rechercheImmeuble->getDateEnquete()) && !empty($rechercheImmeuble->getRefProprioImmeuble()) && !empty($rechercheImmeuble->getNumPlanchCada()) && !empty($rechercheImmeuble->getEtatDossier()) && !empty($rechercheImmeuble->getEnquete()) && !empty($rechercheImmeuble->getDescription()) && !empty($rechercheImmeuble->isVendu()) && !empty($rechercheImmeuble->isNcpcf()) && !empty($rechercheImmeuble->getOrigineContact()) && !empty($rechercheImmeuble->isVisite()) && !empty($rechercheImmeuble->getCommentaire())) {
            return $this->createQueryBuilder('i')
                ->where('i.ReferenceProprio LIKE :refProprioImmeuble')
                ->setParameter('refProprioImmeuble', "%{$rechercheImmeuble->getRefProprioImmeuble()}%")
                ->andWhere('i.NumPlancheCadastrale LIKE :numPlanchCada')
                ->setParameter('numPlanchCada', "%{$rechercheImmeuble->getNumPlanchCada()}%")
                ->andWhere('i.EtatDossier LIKE :etatDossier')
                ->setParameter('etatDossier', "%{$rechercheImmeuble->getEtatDossier()}%")
                ->andWhere('i.Enquete LIKE :enquete')
                ->setParameter('enquete', "%{$rechercheImmeuble->getEnquete()}%")
                ->andWhere('i.DateEnquete LIKE :dateEnquete')
                ->setParameter('dateEnquete', $rechercheImmeuble->getDateEnquete())
                ->andWhere('i.Description LIKE :description')
                ->setParameter('description', "%{$rechercheImmeuble->getDescription()}%")
                ->andWhere('i.SuiviPar LIKE :suiviPar')
                ->setParameter('suiviPar', "%{$rechercheImmeuble->getSuiviPar()}%")
                ->andWhere('i.Vendu LIKE :vendu')
                ->setParameter('vendu', "%{$rechercheImmeuble->isVendu()}%")
                ->andWhere('i.NCPCF LIKE :ncpcf')
                ->setParameter('ncpcf', "%{$rechercheImmeuble->isNcpcf()}%")
                ->andWhere('i.OrigineContact LIKE :origineContact')
                ->setParameter('origineContact', "%{$rechercheImmeuble->getOrigineContact()}%")
                ->andWhere('i.Visite LIKE :visite')
                ->setParameter('visite', "%{$rechercheImmeuble->isVisite()}%")
                ->andWhere('i.Commentaire LIKE :commentaire')
                ->setParameter('commentaire', "%{$rechercheImmeuble->getCommentaire()}%")
                // ->andWhere('i.DateEnquete LIKE :dateEnquete')
                ->getQuery()
                ->getResult();
        }
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
