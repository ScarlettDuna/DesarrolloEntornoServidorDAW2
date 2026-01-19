<?php
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=clothes;charset=utf8",
        "root",
        ""
    );
    $size = $_POST["size"];
    $price = $_POST["price"];
    $brand = $_POST["brand"];
    $color = $_POST["color"];
    $stmtInsert = $pdo->prepare("INSERT INTO pants(size, price, brand, color) VALUES (?, ?, ?, ?)");
    $stmtInsert->execute([$size, $price, $brand, $color]);

    // Mandar tabla actualizada - Confirmación;
    $query = $pdo->query("SELECT * FROM pants");
    $pants = $query->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($pants);
    echo $json;
} catch (PDOException $e) {
    echo $e->getMessage();
}