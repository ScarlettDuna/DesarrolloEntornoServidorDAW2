<?php
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=clothes;charset=utf8",
        "root",
        ""
    );
    // SELECT * FROM people;
    $queryPeople = $pdo->query("SELECT * FROM people");
    $people = $queryPeople->fetchAll(PDO::FETCH_ASSOC);
    // SELECT * FROM pants;
    $queryPants = $pdo->query("SELECT * FROM pants");
    $pants = $queryPants->fetchAll(PDO::FETCH_ASSOC);
    // SELECT * FROM footwear;
    $queryFootwear = $pdo->query("SELECT * FROM footwear");
    $footwear = $queryFootwear->fetchAll(PDO::FETCH_ASSOC);
    // SELECT * FROM tshirts;
    $queryTshirt = $pdo->query("SELECT * FROM tshirts");
    $tshirts = $queryTshirt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode([
        'people' => $people,
        'pants' => $pants,
        'footwear' => $footwear,
        'tshirts' => $tshirts
    ]);

} catch (PDOException $e) {
    echo $e->getMessage();
}