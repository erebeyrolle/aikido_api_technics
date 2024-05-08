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
     * @return PositionsCount[] Returns an array of Positions Count objects
     */
    public function getCountPositions(): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT COUNT (shape.working_shape)
            AS count
            FROM App\Entity\Positions shape'
        );

        $countPositions = $query->getResult();
        return $countPositions;
    }

    /**
     * @return AllWorkingShapes[] Returns an array of Positions objects
     */
    public function getAllWorkingShapes(): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT shape.id, 
                    shape.working_shape, 
                    shape.working_shape_explanations, 
                    shape.working_shape_image 
            FROM App\Entity\Positions shape'
        );

        $positions = $query->getResult();
        return $positions;
    }

    /**
     * @return OneWorkingShape[] Returns an array of One Position object
     */
    public function getOneWorkingShape(int $id): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT shape.working_shape, 
                    shape.working_shape_explanations, 
                    shape.working_shape_image 
            FROM App\Entity\Positions shape 
            WHERE shape.id = :id'
        )->setParameter('id', $id);

        $position = $query->getResult();
        return $position;
    }
}
