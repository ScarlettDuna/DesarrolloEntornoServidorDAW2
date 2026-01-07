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
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Load T-shirts</title>
</head>
<body>
<h1>Current Stock t-shirts</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Brand</th>
        <th>Color</th>
        <th>Price</th>
        <th>Size</th>
    </tr>
    <?php foreach ($tshirts as $item) : ?>
        <tr>
            <td><?= $item['id']?></td>
            <td><?= $item['brand']?></td>
            <td><?= $item['color']?></td>
            <td><?= $item['price'] .'€'?></td>
            <td><?= $item['size']?></td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="./db_ej_menu.php">Go back to Menu</a>
</body>
</html>
