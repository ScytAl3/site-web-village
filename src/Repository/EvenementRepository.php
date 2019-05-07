<?php

namespace App\Repository;

use App\Entity\Evenement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\QueryBuilder as DoctrineQueryBuilder;

/**
 * @method Evenement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Evenement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Evenement[]    findAll()
 * @method Evenement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EvenementRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Evenement::class);
    }

    /**
     * Methode pour recuperer les derniers evenements
     *
     * @return array
     */
    public function findLatest(): array
    {
        // Appelle de la methode  findCurrentNextQuery() 
        return $this->findCurrentNextQuery()
            ->getQuery()
            ->getResult();
    }

    /**
     * Methode qui retourne les evenements dont la date de fin est supérieure a la date du jour
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    private function findCurrentNextQuery(): DoctrineQueryBuilder
    {
        return $this->createQueryBuilder('e')
            ->where('e.dateFinEvent > :today')
            ->setParameter('today', new \DateTime());
    }

    // /**
    //  * @return Evenement[] Returns an array of Evenement objects
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
    public function findOneBySomeField($value): ?Evenement
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
