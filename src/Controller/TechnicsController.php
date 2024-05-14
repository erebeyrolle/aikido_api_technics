<?php

namespace App\Controller;

use App\Repository\TechnicsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TechnicsController extends AbstractController
{
    #[Route('api/technics', name: 'all_technics', methods: ['GET'])]
    public function showAll(TechnicsRepository $technicsRepository, TechnicsRepository $countTechnics): JsonResponse
    {
        $countTechnics = $technicsRepository->getCountTechnics();
        $technics = $technicsRepository->getAllTechnics();
        $result = array_merge($countTechnics, $technics);

        return $this->json($result);
    }

    #[Route('api/technics/{id}', name: 'one_technic', methods: ['GET'])]
    public function showOne(TechnicsRepository $technicsRepository, int $id): JsonResponse
    {
        $technic = $technicsRepository->getOneTechnic($id);

        return $this->json($technic);
    }
}
