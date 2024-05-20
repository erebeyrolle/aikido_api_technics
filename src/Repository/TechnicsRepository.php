<?php

namespace App\Repository;

use App\Entity\Technics;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Technics>
 *
 * @method Technics|null find($id, $lockMode = null, $lockVersion = null)
 * @method Technics|null findOneBy(array $criteria, array $orderBy = null)
 * @method Technics[]    findAll()
 * @method Technics[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TechnicsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Technics::class);
    }

    /**
     * @return TechnicsCount[] Returns an array of Technics Count objects
     */
    public function getCountTechnics(): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT COUNT (tec.id)
            AS count
            FROM App\Entity\Technics tec'
        );

        $countTechnics = $query->getResult();
        return $countTechnics;
    }

    /**
     * @return AllTechnics[] Returns an array of Technics objects
     */
    public function getAllTechnics(): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT tec.id, 
                    tec.technic_name,
                    tecfo.technic_form_name,
                    tec.technic_explanations,
                    tec.technic_video_link
            FROM App\Entity\Technics tec
                INNER JOIN App\Entity\TechnicForms tecfo
            '
        );

        $technics = $query->getResult();
        //dd($technics);
        return $technics;
    }

    /**
     * @return OneTechnic[] Returns an array of One Technic object
     */
    public function getOneTechnic(int $id): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT tec.id, 
                    tec.technic_name,
                    --tecfo.technic_form_name,
                    tec.technic_explanations,
                    tec.technic_video_link                    
            FROM App\Entity\Technics tec
            --INNER JOIN App\Entity\TechnicForms tecfo
            WHERE tec.id = :id'
        )->setParameter('id', $id);

        $technic = $query->getResult();
        return $technic;
    }
}
