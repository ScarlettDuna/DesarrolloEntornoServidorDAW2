<?php
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=clothes;charset=utf8",
        "root",
        ""
    );
} catch (PDOException $e) {
    echo $e->getMessage();
}


// Modify footwear

// SELECT * FROM footwear;
$query = $pdo->query("SELECT * FROM footwear");
$footwear = $query->fetchAll(PDO::FETCH_ASSOC);
print_r($footwear);

// SELECT * FROM footwear WHERE size = ?;
$size = 42;
$fwQuery = $pdo->prepare("SELECT * FROM footwear WHERE size = :size");
$fwQuery->execute(['size' => $size]);
$footwearSize = $fwQuery->fetch(PDO::FETCH_ASSOC);
print_r($footwearSize);

// Insert
$size = 42;
$price = 19.90;
$brand = 'Zara';
$color = 'white';
$stmtInsert = $pdo->prepare("INSERT INTO pants(size, price, brand, color) VALUES (?, ?, ?, ?)");
$stmtInsert->execute([$size, $price, $brand, $color]);


// UPDATE
$size = 38;
$price = 49.90;
$brand = 'New Balance';
$id = 2;
$stmt = $pdo->prepare("UPDATE footwear SET brand=?, size=?, price=? WHERE id=?");
$stmt->execute([$brand, $size, $price, $id]);

// Delete
$id = 4;
$stmtdelete = $pdo->prepare("DELETE FROM footwear WHERE id=?");
$stmtdelete->execute([$id]);
