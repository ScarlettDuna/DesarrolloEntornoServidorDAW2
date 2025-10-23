<?php
// Ejercicio 1
$shop1 = ["Laptop", "Tablet", "Smartphone", "Laptop", "Tablet"];
$shop2 = ['Smartphone', 'Laptop', 'Tablet', 'Smartwatch', 'Smartphone'];
$shop3 = ["Laptop", "Smartwatch", "Tablet", "Tablet", "Smartphone"];

// a. Unify all orders into a single array
$pedidosTotales = array_merge($shop1, $shop2, $shop3);
print_r($pedidosTotales);

// b. Count how many times each product was sold
$ventasPorProducto = array_count_values($pedidosTotales);
print_r($ventasPorProducto);

// c. Find if a specific product was sold
$productoBuscado = "Laptop";

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

// 3. You have an array of students, where each student is represented as an associative array with their name and an array of grades. Your task is to:

$students = [
    ['name' => 'Alice', 'grades' => [85, 78, 92]],
    ['name' => 'Bob', 'grades' => [58, 62, 48]],
    ['name' => 'Charlie', 'grades' => [95, 100, 97]],
    ['name' => 'Diana', 'grades' => [60, 70, 65]],
    ['name' => 'Eve', 'grades' => [40, 50, 55]],
];

// Calculate the average grade for each student. Array_sum, count
$studentAvg = [];
foreach ($students as $student){
    $studentAvg[$student["name"]] = round(array_sum($student["grades"]) / count($student["grades"]), 1);
}
// Sort the remaining students by their average grade in descending order. Usort
arsort($studentAvg);
print_r($studentAvg);

// Create a new array containing strings like: "Name: AverageGrade".
$studentData = [];
foreach ($studentAvg as $name => $grades) {
    array_push($studentData, $name.": ".$grades);
}
print_r($studentData);

// Find the highest average grade among all students max array_column
$maxAverage = max(array_values($studentAvg));
echo $maxAverage."\n"; 

// Print the list of students with their averages and the highest average grade.
foreach ($students as $student) {
    echo "Name: ".$student["name"]. " Average: ".round(array_sum($student["grades"]) / count($student["grades"]), 1)." Highest mark: ".(max($student["grades"]))."\n";
}

// 4. You’re managing a fruit inventory system. You have three arrays: 
// Use: array_diff(), array_keys, and array_splice()

$inventory = [
    "apple" => 50,
    "banana" => 20,
    "cherry" => 30,
    "date" => 15,
    "fig" => 10,
    "grape" => 25
];
$sold_today = ["banana", "date", "kiwi", "apple"];
$restock = [
    "apple" => 20,
    "cherry" => 15,
    "fig" => 5,
    "kiwi" => 10
];
// Identify which fruits were sold today that do not exist in the inventory (i.e., invalid sales).
$diferencia = array_diff($sold_today, array_keys($inventory));
print_r($diferencia);

// From the inventory, find the keys (fruit names) of fruits that were not sold today
$diferencia2 = array_diff(array_keys($inventory), $sold_today);
print_r($diferencia2);

// From those unsold fruits, remove the first two alphabetically (using array_splice).
$diferencia2_2 = array_splice($diferencia2, 2);
print_r($diferencia2_2);

// For the remaining unsold fruits, increase their inventory counts by the corresponding amounts in the restock array (if they exist in restock).
foreach($restock as $name => $quantity){
    $inventory[$name] += $quantity;
}
// Print the final inventory.
echo "Final inventory: ";
print_r($inventory);
?> 