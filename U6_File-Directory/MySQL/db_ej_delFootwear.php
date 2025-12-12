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