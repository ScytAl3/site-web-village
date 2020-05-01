<?php

namespace App\Repository;

use App\Entity\Event;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder as DoctrineQueryBuilder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Event|null find($id, $lockMode = null, $lockVersion = null)
 * @method Event|null findOneBy(array $criteria, array $orderBy = null)
 * @method Event[]    findAll()
 * @method Event[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Event::class);
    }

    /**
     * Methode qui retourne la requete pour avoir les events dans l ordre decroissant,  la requete sera a passer a la classe PaginatorInterface
     * qui est utilisee dans la methode showAllEvent() du controller d evenements
     *
     * @return Query
     */
    public function findAllQuery(): Query
    {
        return $this->createQueryBuilder('e')
            ->orderBy('e.idEvent', 'DESC')
            ->getQuery();
    }

    /**
     * Methode pour recuperer les evenements commences
     *
     * @return array
     */
    public function findCurrent(): array
    {
        // Appelle de la methode findCurrentQuery() 
        return $this->findCurrentQuery()
            ->getQuery()
            ->getResult();
    }

    /**
     * Methode pour recuperer les prochains evenements
     *
     * @return array
     */
    public function findNext(): array
    {
        // Appelle de la methode findNextQuery() 
        return $this->findNextQuery()
            ->getQuery()
            ->getResult();
    }

    /**
     * Methode qui retourne les evenements dont la date de fin est supérieure a la date du jour
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    private function findCurrentQuery(): DoctrineQueryBuilder
    {
        return $this->createQueryBuilder('e')
            ->where('e.endDateEvent >= :today')
            ->andWhere('e.startDateEvent <= :today')
            ->setParameter('today', new \DateTime())
            ->orderBy('e.endDateEvent');
    }

    /**
     * Methode qui retourne les evenements dont la date de debut est superieure a la date du jour
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    private function findNextQuery(): DoctrineQueryBuilder
    {
        return $this->createQueryBuilder('e')
            ->where('e.startDateEvent > :today')
            ->setParameter('today', new \DateTime())
            ->orderBy('e.startDateEvent');
    }

    // /**
    //  * @return Event[] Returns an array of Event objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Event
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
