<?php

use App\Entity\Supplier;
use Doctrine\ORM\EntityManagerInterface;

require dirname(__DIR__) . '/vendor/autoload.php';

// Bootstrap Symfony para obtener el EntityManager
$kernel = new App\Kernel('dev', true);
$kernel->boot();

/** @var EntityManagerInterface $entityManager */
$entityManager = $kernel->getContainer()
    ->get('doctrine')
    ->getManager();

// Crear Supplier
$supplier = new Supplier();
$supplier->setName('Nike');
$supplier->setAddress('Portland, USA');

// Persistir
$entityManager->persist($supplier);
$entityManager->flush();

echo "Supplier insertado con ID: " . $supplier->getId();

