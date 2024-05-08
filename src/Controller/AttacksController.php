<?php

namespace App\Controller;

use App\Repository\AttacksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AttacksController extends AbstractController
{
    #[Route('/api/attacks_type', name: 'all_attacks_type', methods: ['GET'])]
    public function showAll(AttacksRepository $attacksRepository, AttacksRepository $countAttacks): JsonResponse
    {
        $countAttacks = $attacksRepository->getCountAttacks();
        $attacks = $attacksRepository->getAllAttacks();
        $result = array_merge($countAttacks, $attacks);

        return $this->json($result);
    }

    #[Route('/api/attacks_type/{id}', name: 'one_attack_type', methods: ['GET'])]
    public function showOne(AttacksRepository $attacksRepository, int $id): JsonResponse
    {
        $attack = $attacksRepository->getOneAttack($id);

        return $this->json($attack);
    }
}
