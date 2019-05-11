<?php

namespace App\Repository;

use App\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\QueryBuilder as DoctrineQueryBuilder;

/**
 * @method Event|null find($id, $lockMode = null, $lockVersion = null)
 * @method Event|null findOneBy(array $criteria, array $orderBy = null)
 * @method Event[]    findAll()
 * @method Event[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Event::class);
    }

    /**
     * Methode pour recuperer les derniers Events
     *
     * @return array
     */
    public function findLatest(): array
    {
        // Appelle de la methode findCurrentNextQuery() 
        return $this->findCurrentNextQuery()
            ->getQuery()
            ->getResult();
    }

    /**
     * Methode qui retourne les Events dont la date de fin est supérieure a la date du jour
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    private function findCurrentNextQuery(): DoctrineQueryBuilder
    {
        return $this->createQueryBuilder('e')
            ->where('e.endDateEvent > :today')
            ->setParameter('today', new \DateTime());
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
