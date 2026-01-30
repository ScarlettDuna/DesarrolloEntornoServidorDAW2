<?php

use App\Entity\Item;
use App\Entity\Supplier;

$entityManager = require '../../config/doctrine.php';

$nuevoItem = new Item();
$nuevoItem->setName("Vomero 19");
$nuevoItem->setDescription("Zapatillas running");
$nuevoItem->setQuantity(10);
$nuevoItem->setPrice(149.99);
$supplier = $entityManager->find(Supplier::class, 1);
$nuevoItem->setSupplier($supplier);
$entityManager->persist($nuevoItem);
$entityManager->flush();
echo "Item insertado con ID: " . $nuevoItem->getId();
