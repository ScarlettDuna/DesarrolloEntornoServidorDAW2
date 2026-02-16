<?php

namespace App\Controller;

use App\Entity\Outfit;
use App\Form\OutfitType;
use App\Repository\OutfitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class OutfitController extends AbstractController
{
    #[Route('/outfit', name: 'app_outfit')]
    public function index(OutfitRepository $repository): Response
    {
        $outfits = $repository->findAll();

        return $this->render('outfit/index.html.twig', [
            'products' => $outfits,
        ]);
    }
    #[Route('/outfit/new', name: 'outfit_new')]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $outfit = new Outfit();
        $form = $this->createForm(OutfitType::class, $outfit);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($outfit);
            $manager->flush();
            $this->addFlash(
                'notice',
                'Outfit successfully created'
            );
            return $this->redirectToRoute('app_outfit');
        }
        return $this->render('outfit/new.html.twig', [
            'form' => $form,
        ]);
    }
}
