<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\SupplierRepository;
use App\Entity\Supplier;
use App\Form\SupplierType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
final class SupplierController extends AbstractController
{
    #[Route('/supplier', name: 'app_supplier')]
    public function index(SupplierRepository $repository): Response
    {
        $products = $repository->findAll();

        return $this->render('supplier/index.html.twig', /* path relative to templates folder */
        ['products' => $products]);
    }

    #[Route('/supplier/{id<\d>}', name: 'supplier_show')]
    public function show(Supplier $product): Response
    {
        return $this->render('supplier/show.html.twig', [
            'product' => $product
        ]);
    }
    #[Route('/supplier/new', name: 'supplier_new')]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $product = new Supplier();
        $form = $this->createForm(SupplierType::class, $product);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($product);
            $manager->flush();
            $this->addFlash(
                'notice',
                'The supplier was successfully created'
            );
            return $this->redirectToRoute('supplier_show', ['id' => $product->getId()]);
        }

        return $this->render('supplier/new.html.twig', [
            'form' => $form,
        ]);
    }
    #[Route('/supplier/{id<\d+>}/edit', name: 'supplier_edit')]
    public function edit(Supplier $product, Request $request, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(SupplierType::class, $product);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->flush();
            $this->addFlash(
                'notice',
                'The supplier was successfully updated'
            );
            return $this->redirectToRoute('supplier_show', ['id' => $product->getId()]);
        }

        return $this->render('supplier/edit.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/supplier/{id}/delete', name: 'supplier_delete')]
    public function delete(Request $request, Supplier $product, EntityManagerInterface $manager): Response
    {
        if ($request->getMethod() == 'POST') {
            $manager->remove($product);
            $manager->flush();
            $this->addFlash(
                'notice',
                'The supplier was successfully deleted'
            );
            return $this->redirectToRoute('app_supplier', ['id' => $product->getId()]);
        }
        return $this->render('supplier/delete.html.twig', [
            'id' => $product->getId(),
        ]);
    }
}
