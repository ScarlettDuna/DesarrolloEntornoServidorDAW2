<?php

require __DIR__ . '/../vendor/autoload.php';
use MongoDB\BSON\ObjectId;

try {
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $db = $client->clothes;
    // SELECT * FROM footwear;
    $footwear = $db->footwear;
    $stock = $footwear->find()->toArray();

} catch (Exception $e) {
    echo $e->getMessage();
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $size = $_POST["size"];
    $price = $_POST["price"];
    $brand = $_POST["brand"];
    $id = $_POST["id"];
    $color = $_POST["color"];
    // Update
    $footwear->updateOne(
        ['_id' => new ObjectId($id)],
        ['$set' => ['brand' => $brand, 'size' => (int) $size, 'price' => (float) $price, 'color' => $color]]
    );
    header("Location: mongo_modfootwear.php");
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
    <link rel="stylesheet" href="style.css">
    <title>Modify Footwear</title>
</head>
<body>
<h1>Modify Footwear</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Brand</th>
        <th>Color</th>
        <th>Price</th>
        <th>Size</th>
    </tr>
    <?php foreach ($stock as $footitem) : ?>
        <tr>
            <td><?= (string) $footitem['_id']?></td>
            <td><?= $footitem['brand']?></td>
            <td><?= $footitem['color']?></td>
            <td><?= $footitem['price']?></td>
            <td><?= $footitem['size']?></td>
        </tr>
    <?php endforeach; ?>
</table>
<form method="post">
    <h2>What item do you want to update?</h2>
    <label for="id">Item</label>
    <select name="id" id="id" required>
        <?php foreach ($stock as $footitem) : ?>
            <option value="<?= (string)$footitem->_id; ?>"><?= $footitem->brand.' | '.$footitem->color.' | '.$footitem->price.' | '.$footitem->size; ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <label for="brand">Brand</label>
    <input type="text" name="brand" id="brand" required><br>
    <label for="color">Color</label>
    <input type="text" name="color" id="color" required><br>
    <label for="price">Price</label>
    <input type="number" name="price" id="price" step="0.01" required><br>
    <label for="size">Size</label>
    <input type="number" name="size" id="size" required><br>
    <button type="submit">Update item</button>
</form>
<a href="./mongo_menu.php">Go back to Menu</a>
</body>
</html>
