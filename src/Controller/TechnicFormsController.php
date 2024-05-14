<?php

namespace App\Controller;

use App\Repository\TechnicFormsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TechnicFormsController extends AbstractController
{
    #[Route('api/technicforms', name: 'all_technicforms', methods: ['GET'])]
    public function showAll(TechnicFormsRepository $technicFormsRepository, TechnicFormsRepository $countTechnics): JsonResponse
    {
        $countTechnicForms = $technicFormsRepository->getCountTechnicForms();
        $technicForms = $technicFormsRepository->getAllTechnicForms();
        $result = array_merge($countTechnicForms, $technicForms);

        return $this->json($result);
    }

    #[Route('api/technicforms/{id}', name: 'one_technicform', methods: ['GET'])]
    public function showOne(TechnicFormsRepository $technicFormsRepository, int $id): JsonResponse
    {
        $technicForm = $technicFormsRepository->getOneTechnicForm($id);

        return $this->json($technicForm);
    }
}
