<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\SupplierRepository;
use App\Entity\Supplier;
use App\Form\SupplierType;
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
    public function new(): Response
    {
        $form = $this->createForm(SupplierType::class);
        return $this->render('supplier/new.html.twig', [
            'form' => $form,
        ]);
    }
}
