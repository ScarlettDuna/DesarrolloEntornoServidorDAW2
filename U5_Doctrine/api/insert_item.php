<?php

use App\Entity\Item;
use App\Entity\Supplier;

$entityManager = require '../../config/doctrine.php';

// Recupera los datos del POST
$name = $_POST['item_name'];
$description = $_POST['description'];
$price = floatval($_POST['price']);
$quantity = intval($_POST['quantity']);
$supplier_id = intval($_POST['supplier']);
// Doctrine inserta un nuevo Item
$supplier = $entityManager->find(Supplier::class, $supplier_id);
if ($supplier == null) {
    echo "Supplier not found. Can't insert this item";
    return;
}

$nuevoItem = new Item();
$nuevoItem->setName($name);
$nuevoItem->setDescription($description);
$nuevoItem->setQuantity($quantity);
$nuevoItem->setPrice($price);
$nuevoItem->setSupplier($supplier);
$entityManager->persist($nuevoItem);
$entityManager->flush();

echo "Item insertado con ID: " . $nuevoItem->getId();

