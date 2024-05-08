<?php

namespace App\Controller;

use App\Repository\PositionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PositionsController extends AbstractController
{
    #[Route('/api/working_shapes', name: 'all_working_shapes', methods: ['GET'])]
    public function showAll(PositionsRepository $positionsRepository, PositionsRepository $countPositions): JsonResponse
    {
        $countPositions = $positionsRepository->getCountPositions();
        $positions = $positionsRepository->getAllWorkingShapes();
        $result = array_merge($countPositions, $positions);

        return $this->json($result);
    }

    #[Route('/api/working_shapes/{id}', name: 'one_working_shape', methods: ['GET'])]
    public function showOne(PositionsRepository $positionsRepository, int $id): JsonResponse
    {
        $position = $positionsRepository->getOneWorkingShape($id);

        return $this->json($position);
    }
}
