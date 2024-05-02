<?php
    // src\Controller\PositionsController.php

namespace App\Repository;

use App\Entity\Positions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Positions>
 *
 * @method Positions|null find($id, $lockMode = null, $lockVersion = null)
 * @method Positions|null findOneBy(array $criteria, array $orderBy = null)
 * @method Positions[]    findAll()
 * @method Positions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class PositionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Positions::class);
    }

    /**
     * @return AllWorkingShapes[]
     */
    public function getAllWorkingShapes(): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery('SELECT shape.id, shape.working_shape, shape.explanation_working_shape FROM App\Entity\Positions shape');
        $positions = $query->getResult();
        return $positions;
    }

    /**
     * @return OneWorkingShape[]
     */
    public function getOneWorkingShape(int $id):array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery('SELECT shape.working_shape, shape.explanation_working_shape FROM App\Entity\Positions shape WHERE shape.id = :id')->setParameter('id', $id);
        $position = $query->getResult();
        return $position;
    }
    // public function add(Positions $entity, bool $flush = false): void
    // {
    //     $this->getEntityManager()->persist($entity);

    //     if ($flush) {
    //         $this->getEntityManager()->flush();
    //     }
    // }

    // public function remove(Positions $entity, bool $flush = false): void
    // {
    //     $this->getEntityManager()->remove($entity);

    //     if ($flush) {
    //         $this->getEntityManager()->flush();
    //     }
    // }

//    /**
//     * @return Positions[] Returns an array of Positions objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Positions
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
