<?php

namespace App\Repository;

use App\Entity\Immeuble;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
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
     * @return Immeuble[] Returns an array of Immeuble objects
     */
    public function findByAllFields(): array
    {
        return $this->createQueryBuilder('i')
            ->select('i.ReferenceProprio as refProprio, i.NumPlancheCadastrale as numCada, i.EtatDossier as etatDossier, i.Enquete as enquete, i.DateEnquete as dateEnquete, i.Description as desc, i.SuiviPar as suiviPar, i.Vendu as vendu, i.NCPCF as ncpcf, i.OrigineContact as oriCon, i.Visite as visite, i.Commentaire')
            ->getQuery()
            ->getResult();
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
