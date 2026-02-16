<?php

namespace App\Controller;

use App\Entity\Pants;
use App\Form\PantsType;
use App\Repository\PantsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PantsController extends AbstractController
{
    #[Route('/pants', name: 'app_pants')]
    public function index(PantsRepository $repository): Response
    {
        $pants = $repository->findAll();

        return $this->render('pants/index.html.twig', [
            'products' => $pants,
        ]);
    }
    #[Route('/pants/new', name: 'pants_new')]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $product = new Pants();
        $form = $this->createForm(PantsType::class, $product);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($product);
            $manager->flush();
            $this->addFlash(
                'notice',
                'Pants added successfully'
            );
            return $this->redirectToRoute('app_pants');
        }
        return $this->render('pants/new.html.twig', [
            'form' => $form,
        ]);
    }
}

