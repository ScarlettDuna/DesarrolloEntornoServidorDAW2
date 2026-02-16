<?php

namespace App\Controller;

use App\Entity\Footwear;
use App\Form\FootwearType;
use App\Repository\FootwearRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FootwearController extends AbstractController
{
    #[Route('/footwear', name: 'app_footwear')]
    public function index(FootwearRepository $repository): Response
    {
        $footwear = $repository->findAll();

        return $this->render('footwear/index.html.twig', [
            'products' => $footwear,
        ]);
    }
    #[Route('/footwear/new', name: 'footwear_new')]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $footwear = new Footwear();
        $form = $this->createForm(FootwearType::class, $footwear);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($footwear);
            $manager->flush();
            $this->addFlash(
                'notice',
                'Footwear added successfully'
            );
            return $this->redirectToRoute('app_footwear');
        }
        return $this->render('footwear/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/footwear/{id<\d+>}/edit', name: 'footwear_edit')]
    public function edit(Footwear $footwear, Request $request, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(FootwearType::class, $footwear);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->flush();
            $this->addFlash(
                'notice',
                'The footwear was successfully updated'
            );
            return $this->redirectToRoute('app_footwear');
        }

        return $this->render('footwear/edit.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/footwear/{id}/delete', name: 'footwear_delete')]
    public function delete(EntityManagerInterface $manager, Footwear $footwear): Response
    {
        $manager->remove($footwear);
        $manager->flush();
        $this->addFlash(
            'notice',
            'Footwear successfully deleted!'
        );
        return $this->redirectToRoute('app_footwear');
    }
}
