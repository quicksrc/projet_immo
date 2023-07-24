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
    public function findBySearch(RechercheImmeuble $rechercheImmeuble)
    {
        // $db = $this->createQueryBuilder('i');

        // return $db->select('i')
        //     ->where($db->expr()->isNull('i.ReferenceProprio'))
        //     ->andWhere($db->expr()->isNull('i.NCPCF'))
        //     ->andWhere($db->expr()->isNull('i.OrigineContact'))
        //     ->andWhere($db->expr()->isNull('i.Visite'))
        //     ->getQuery()
        //     ->getResult();

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

        // $immeubles = [];
        // for ($i = 0; $i < 1; $i++) {
        //     if (!empty($rechercheImmeuble->getRefProprioImmeuble())) {
        //         array_push($immeubles, "ReferenceProprio : refProprioImmeuble : " . $rechercheImmeuble->getRefProprioImmeuble());
        //     }
        //     if (!empty($rechercheImmeuble->isNcpcf())) {
        //         array_push($immeubles, "NCPCF : ncpcf : " . $rechercheImmeuble->isNcpcf());
        //     }
        //     if (!empty($rechercheImmeuble->getOrigineContact())) {
        //         array_push($immeubles, "OrigineContact : origineContact : " . $rechercheImmeuble->getOrigineContact());
        //     }
        //     if (!empty($rechercheImmeuble->isVisite())) {
        //         array_push($immeubles, "Visite : visite : " . $rechercheImmeuble->isVisite());
        //     }
        // };

        // $query = QueryBuilder::class;
        // $queries = [];

        // if (!empty($immeubles)) {
        //     for ($i = 0; $i < count($immeubles); $i++) {
        //         // $strImmeuble = implode(" ", $immeubles);
        //         $explodeImmeuble = explode(' : ', $immeubles[$i]);
        //         $query = $this->createQueryBuilder('i')
        //             ->where('i.' . $explodeImmeuble[0] . ' LIKE ' . $explodeImmeuble[2])
        //             ->setParameter($explodeImmeuble[1], $explodeImmeuble[2]);
        //         array_push($queries, $query->__toString());
        //     };
        // }
        // if (count($queries) > 1) {
        //     $explodeQueries = explode(' WHERE ', $queries[1]);
        //     array_push($queries, $queries[0] . ' AND ' . $explodeQueries[1]);
        // }
        // $queriesExplode = explode('WHERE ', $queries[2]);
        // $queriesExplode2 = explode(' AND ', $queriesExplode[1]);
        // $queriesExplode3 = [];
        // for ($i = 0; $i < count($queriesExplode2); $i++) {
        //     array_push($queriesExplode3, explode(' LIKE ', $queriesExplode2[$i]));
        // }
        // // dd($queriesExplode3);
        // $finalQuery = $em
        //     ->createQuery(end($queries))
        //     ->setParameters([
        //         $queriesExplode3[0][0] => 27,
        //         $queriesExplode3[1][0] => $queriesExplode3[1][1]
        //     ]);
        // // dd($finalQuery);
        // return $finalQuery->getResult();
        // dd($queriesExplode3);
        //  else {
        //     // $query = $this->createQueryBuilder('i')
        //     //     ->select('i', '100');
        // }


        // return $this->createQueryBuilder('i')
        //     ->where('i.ReferenceProprio LIKE :refProprioImmeuble')
        //     ->setParameter('refProprioImmeuble', $rechercheImmeuble->getRefProprioImmeuble())
        //     ->andwhere('i.DateEnquete LIKE :dateEnquete')
        //     ->setParameter('dateEnquete', $rechercheImmeuble->getDateEnquete())
        //     ->getQuery()
        //     ->getResult();

        // if (!empty($rechercheImmeuble->getRefProprioImmeuble()) && !empty($rechercheImmeuble->getDateEnquete())) {
        // }

        // if (!empty($rechercheImmeuble->getSuiviPar()) && !empty($rechercheImmeuble->getDateEnquete()) && !empty($rechercheImmeuble->getRefProprioImmeuble()) && !empty($rechercheImmeuble->getNumPlanchCada()) && !empty($rechercheImmeuble->getEtatDossier()) && !empty($rechercheImmeuble->getEnquete()) && !empty($rechercheImmeuble->getDescription()) && !empty($rechercheImmeuble->isVendu()) && !empty($rechercheImmeuble->isNcpcf()) && !empty($rechercheImmeuble->getOrigineContact()) && !empty($rechercheImmeuble->isVisite()) && !empty($rechercheImmeuble->getCommentaire())) {
        //     return $this->createQueryBuilder('i')
        //         ->where('i.ReferenceProprio LIKE :refProprioImmeuble')
        //         ->setParameter('refProprioImmeuble', "%{$rechercheImmeuble->getRefProprioImmeuble()}%")
        //         ->andWhere('i.NumPlancheCadastrale LIKE :numPlanchCada')
        //         ->setParameter('numPlanchCada', "%{$rechercheImmeuble->getNumPlanchCada()}%")
        //         ->andWhere('i.EtatDossier LIKE :etatDossier')
        //         ->setParameter('etatDossier', "%{$rechercheImmeuble->getEtatDossier()}%")
        //         ->andWhere('i.Enquete LIKE :enquete')
        //         ->setParameter('enquete', "%{$rechercheImmeuble->getEnquete()}%")
        //             ->andwhere('i.DateEnquete LIKE :dateEnquete')
        //             ->setParameter('dateEnquete', $rechercheImmeuble->getDateEnquete())
        //         ->andWhere('i.Description LIKE :description')
        //         ->setParameter('description', "%{$rechercheImmeuble->getDescription()}%")
        //         ->andWhere('i.SuiviPar LIKE :suiviPar')
        //         ->setParameter('suiviPar', "%{$rechercheImmeuble->getSuiviPar()}%")
        //         ->andWhere('i.Vendu LIKE :vendu')
        //         ->setParameter('vendu', "%{$rechercheImmeuble->isVendu()}%")
        //         ->andWhere('i.NCPCF LIKE :ncpcf')
        //         ->setParameter('ncpcf', "%{$rechercheImmeuble->isNcpcf()}%")
        //         ->andWhere('i.OrigineContact LIKE :origineContact')
        //         ->setParameter('origineContact', "%{$rechercheImmeuble->getOrigineContact()}%")
        //         ->andWhere('i.Visite LIKE :visite')
        //         ->setParameter('visite', "%{$rechercheImmeuble->isVisite()}%")
        //         ->andWhere('i.Commentaire LIKE :commentaire')
        //         ->setParameter('commentaire', "%{$rechercheImmeuble->getCommentaire()}%")
        //         ->getQuery()
        //         ->getResult();
        // }
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
