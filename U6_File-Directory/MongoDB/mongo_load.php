<?php

require __DIR__ . '/../vendor/autoload.php';

try {
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $db = $client->clothes;
    // SELECT * FROM tshirts;
    $tshirts = $db->tshirts;
    $stock = $tshirts->find();
} catch (Exception $e) {
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
    <?php foreach ($stock as $item) : ?>
        <tr>
            <td><?= (string) $item['_id']?></td>
            <td><?= $item['brand']?></td>
            <td><?= $item['color']?></td>
            <td><?= $item['price'] .'€'?></td>
            <td><?= $item['size']?></td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="./mongo_menu.php">Go back to Menu</a>
</body>
</html>
