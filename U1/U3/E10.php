<?php
// Ejercicio 1
$shop1 = ["Laptop", "Tablet", "Smartphone" ];
$shop2 = [];
$shop3 = ["Laptop", "Smartwatch", "Tablet", "Tablet", "Smartphone"];

// a. Unify all orders into a single array
$pedidosTotales = array_merge($shop1, $shop2, $shop3);
print_r($pedidosTotales);

// b. Count how many times each product was sold
$ventasPorProducto = array_count_values($pedidosTotales);
print_r($ventasPorProducto);

// c. Find if a specific product was sold
$productoBuscado = "Tablet";

if (in_array($productoBuscado, array_keys($ventasPorProducto))){
    echo "The product was sold. \n";
} else {
    echo "The product wasn´t sold. \n";
}


// Ejercicio 2 - You have 2 arrays: one with product names another with quantities available in inventory.
// Additionally, you receive an array with inventory updates (products with new quantities)
$products = ["Laptop", "Tablet", "Smartphone", "Monitor"];
$quantities = [10, 20, 15, 5];
$updates = ["Tablet" => 18, "Monitor" => 7, "Laptop" => 12];
// Combine the first two arrays to create an associative array product => quantity  - array_combine()
$inventory = array_combine($products, $quantities);
print_r($inventory);

// Update the inventory using the updates array - array_replace()
$updated_inventory = array_replace($inventory, $updates);
print_r($updated_inventory);

// Sort the inventory by product name (alphabetically)
/* 
ksort() → ordena por clave (producto)
asort() → ordena por valor (cantidad)
arsort() → ordena por valor descendente
krsort() → ordena por clave descendente*/

ksort($updated_inventory, SORT_STRING);

// Display the final inventory
print_r($updated_inventory);

?> 