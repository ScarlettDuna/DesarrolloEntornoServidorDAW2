<?php
$id = $_GET["id"];
// Comprobamos que 'id' es un int (valor posible)
if (ctype_digit($id)) {
    try {
        $pdo = new PDO(
            "mysql:host=localhost;dbname=clothes;charset=utf8",
            "root",
            ""
        );
        // Borrar
        $stmtcheck = $pdo->prepare("SELECT * FROM footwear WHERE id = :id");
        $stmtcheck->execute([":id", $id]);
        $check = $stmtcheck->fetch();
        // Si el ID existe en la base de datos, borramos
        if ($check) {
            $stmtdelete = $pdo->prepare("DELETE FROM footwear WHERE id=?");
            $stmtdelete->execute([$id]);
            // Devolver listado actualizado
            $query = $pdo->query("SELECT * FROM footwear");
            $footwear = $query->fetchAll(PDO::FETCH_ASSOC);
            $json = json_encode($footwear);
            echo $json;
        } else {
            echo '{"message":"Id no encontrado en la base de datos"}';
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} else {
    echo '{"message":"Id incorrecto"}';
}
