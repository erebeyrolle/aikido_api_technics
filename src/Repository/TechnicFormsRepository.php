<?php

namespace App\Repository;

use App\Entity\TechnicForms;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TechnicForm>
 *
 * @method TechnicForm|null find($id, $lockMode = null, $lockVersion = null)
 * @method TechnicForm|null findOneBy(array $criteria, array $orderBy = null)
 * @method TechnicForm[]    findAll()
 * @method TechnicForm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TechnicFormsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TechnicForms::class);
    }

    /**
     * @return TechnicFormsCount[] Returns an array of TechnicForms Count objects
     */
    public function getCountTechnicForms(): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT COUNT (tecfo.id)
            AS count
            FROM App\Entity\TechnicForms tecfo'
        );

        $countTechnicForms = $query->getResult();
        return $countTechnicForms;
    }

    /**
     * @return AllTechnicForms[] Returns an array of TechnicForms objects
     */
    public function getAllTechnicForms(): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT tecfo.id, 
                    tecfo.technic_form_name, 
                    tecfo.technic_form_explanations,
                    tecfo.technic_form_image 
            FROM App\Entity\TechnicForms tecfo'
        );

        $technicForms = $query->getResult();
        return $technicForms;
    }

    /**
     * @return OneTechnicForm[] Returns an array of One TechnicForm object
     */
    public function getOneTechnicForm(int $id): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT tecfo.id, 
                    tecfo.technic_form_name, 
                    tecfo.technic_form_explanations,
                    tecfo.technic_form_image
            FROM App\Entity\TechnicForms tecfo
            WHERE tecfo.id = :id'
        )->setParameter('id', $id);

        $technicForm = $query->getResult();
        return $technicForm;
    }
}
