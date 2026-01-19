<?php
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=clothes;charset=utf8",
        "root",
        ""
    );
    $person_id   = $_POST['idPerson'];
    $footwear_id = $_POST['idFootwear'];
    $pants_id    = $_POST['idPants'];
    $tshirt_id   = $_POST['idTshirt'];
    $date = date('Y-m-d');
    // INSERT INTO outfits (person_id, pants_id, tshirt_id, footwear_id, date) VALUES (?, ?, ?, ?, ?)
    $stmtInsert = $pdo->prepare("INSERT INTO outfits (person_id, pants_id, tshirt_id, footwear_id, date) VALUES (?, ?, ?, ?, ?)");
    $stmtInsert->execute([$person_id, $pants_id, $tshirt_id, $footwear_id, $date]);
    $stmt = $pdo->query("SELECT * FROM outfits");
    $outfits = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($outfits);

} catch (PDOException $e) {
    echo $e->getMessage();
}
