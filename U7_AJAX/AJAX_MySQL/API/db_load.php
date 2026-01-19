<?php
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=clothes;charset=utf8",
        "root",
        ""
    );
    // SELECT * FROM tshirts;
    $query = $pdo->query("SELECT * FROM tshirts");
    $tshirts = $query->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($tshirts);
} catch (PDOException $e) {
    echo $e->getMessage();
}