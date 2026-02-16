<?php

namespace App\Controller;

use App\Repository\TshirtsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TshirtsController extends AbstractController
{
    #[Route('/tshirts', name: 'app_tshirts')]
    public function index(TshirtsRepository $repository): Response
    {
        $tshirts = $repository->findAll();

        return $this->render('tshirts/index.html.twig', [
            'products' => $tshirts,
        ]);
    }
}
