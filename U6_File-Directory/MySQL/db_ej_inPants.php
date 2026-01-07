<?php
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=clothes;charset=utf8",
        "root",
        ""
    );
    // SELECT * FROM pants;
    $query = $pdo->query("SELECT * FROM pants");
    $pants = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['brand'])) {
    $size = $_POST["size"];
    $price = $_POST["price"];
    $brand = $_POST["brand"];
    $color = $_POST["color"];
    $stmtInsert = $pdo->prepare("INSERT INTO pants(size, price, brand, color) VALUES (?, ?, ?, ?)");
    $stmtInsert->execute([$size, $price, $brand, $color]);
    header('Location: db_ej_inPants.php');
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
    <?php foreach ($pants as $pantsitem) : ?>
        <tr>
            <td><?= $pantsitem['id']?></td>
            <td><?= $pantsitem['brand']?></td>
            <td><?= $pantsitem['color']?></td>
            <td><?= $pantsitem['price'] .'€'?></td>
            <td><?= $pantsitem['size']?></td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="./db_ej_menu.php">Go back to Menu</a>
</body>
</html>
