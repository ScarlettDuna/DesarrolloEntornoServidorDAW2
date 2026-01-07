<?php

require __DIR__ . '/../vendor/autoload.php';

try {
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $db = $client->clothes;
    // SELECT * FROM pants;
    $pants = $db->pants;
    $stock = $pants->find();
} catch (Exception $e) {
    echo $e->getMessage();
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['brand'])) {
    $size = $_POST["size"];
    $price = $_POST["price"];
    $brand = $_POST["brand"];
    $color = $_POST["color"];
    $pants->insertOne([
        'size' => (int) $size,
        'price' => (float) $price,
        'brand' => $brand,
        'color' => $color
    ]);
    header('Location: mongo_inPants.php');
    exit;
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Input Pants</title>
</head>
<body>
<h1>Input Pants</h1>
<form method="post">
    <h2>Insert the details of the item you want to input</h2>
    <label for="brand">Brand</label>
    <input type="text" name="brand" id="brand"  required><br>
    <label for="color">Color</label>
    <input type="text" name="color" id="color"  required><br>
    <label for="price">Price</label>
    <input type="number" name="price" id="price" step="0.01" required><br>
    <label for="size">Size</label>
    <input type="number" name="size" id="size"  required><br>
    <button type="submit">Insert item</button>
</form>
<h2>Current Stock</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Brand</th>
        <th>Color</th>
        <th>Price</th>
        <th>Size</th>
    </tr>
    <?php foreach ($stock as $pantsitem) : ?>
        <tr>
            <td><?= (string) $pantsitem['_id']?></td>
            <td><?= $pantsitem['brand']?></td>
            <td><?= $pantsitem['color']?></td>
            <td><?= $pantsitem['price'] .'€'?></td>
            <td><?= $pantsitem['size']?></td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="./mongo_menu.php">Go back to Menu</a>
</body>
</html>
