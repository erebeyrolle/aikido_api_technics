<?php
// src\Controller\AttacksController.php

namespace App\Repository;

use App\Entity\Attacks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Attacks>
 *
 * @method Attacks|null find($id, $lockMode = null, $lockVersion = null)
 * @method Attacks|null findOneBy(array $criteria, array $orderBy = null)
 * @method Attacks[]    findAll()
 * @method Attacks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AttacksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Attacks::class);
    }

    /**
     * @return AllAttacks[] Returns an array of All Attacks objects
     */
    public function getAllAttacks(): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT atck.id, 
                    atck.attack_type, 
                    atck.attack_type_explanations, 
                    atck.attack_type_image 
            FROM App\Entity\Attacks atck'
        );

        $attacks = $query->getResult();
        return $attacks;
    }

    /**
     * @return OneAttack[] Returns an array of One Attack object
     */
    public function getOneAttack(int $id): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT atck.attack_type, 
                    atck.attack_type_explanations, 
                    atck.attack_type_image 
            FROM App\Entity\Attacks atck 
            WHERE atck.id = :id'
        )->setParameter('id', $id);

        $attack = $query->getResult();
        return $attack;
    }
}
