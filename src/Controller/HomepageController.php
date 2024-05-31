<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    #[Route('/api', name: 'api_homepage')]
    // public function index(): JsonResponse
    // {
    //     return $this->json([
    //         'message' => 'Welcome to your new controller!',
    //         'path' => 'src/Controller/HomepageController.php',
    //         'command' => 'composer update --with-all-dependencies with php 8.3.4 for good twig installation',
    //         'twig' => 'composer require "twig/twig:^3.X"'
    //     ]);
    // }

    public function index(): Response
    {
            return $this->render('base.html.twig');
    }
}
