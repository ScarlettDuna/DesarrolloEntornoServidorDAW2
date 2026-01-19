<?php
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=clothes;charset=utf8",
        "root",
        ""
    );
    $campo = $_POST["campo"];
    $id = $_POST["id"];
    $valor = $_POST["valor"];
    $stmt = $pdo->prepare("UPDATE footwear SET ".$campo."=? WHERE id=?");
    $stmt->execute([$valor, $id]);

    // Mandar tabla actualizada - Confirmación;
    $query = $pdo->query("SELECT * FROM footwear");
    $footwear = $query->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($footwear);

} catch (PDOException $e) {
    echo $e->getMessage();
}