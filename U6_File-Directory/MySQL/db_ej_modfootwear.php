<?php
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=clothes;charset=utf8",
        "root",
        ""
    );
    // SELECT * FROM footwear;
    $query = $pdo->query("SELECT * FROM footwear");
    $footwear = $query->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo $e->getMessage();
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $size = $_POST["size"];
    $price = $_POST["price"];
    $brand = $_POST["brand"];
    $id = $_POST["id"];
    $color = $_POST["color"];
    $stmt = $pdo->prepare("UPDATE footwear SET brand=?, size=?, price=?, color=? WHERE id=?");
    $stmt->execute([$brand, $size, $price, $color, $id]);
    header("Location: db_ej_modfootwear.php");
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
    <?php foreach ($footwear as $footitem) : ?>
    <tr>
        <td><?= $footitem['id']?></td>
        <td><?= $footitem['brand']?></td>
        <td><?= $footitem['color']?></td>
        <td><?= $footitem['price']?></td>
        <td><?= $footitem['size']?></td>
    </tr>
    <?php endforeach; ?>
</table>
<form method="post">
    <h2>What item do you want to update?</h2>
    <label for="id">ID</label>
    <input type="number" name="id" id="id" required><br>
    <label for="brand">Brand</label>
    <input type="text" name="brand" id="brand"  required><br>
    <label for="color">Color</label>
    <input type="text" name="color" id="color"  required><br>
    <label for="price">Price</label>
    <input type="number" name="price" id="price" step="0.01" required><br>
    <label for="size">Size</label>
    <input type="number" name="size" id="size"  required><br>
    <button type="submit">Update item</button>
</form>
<a href="./db_ej_menu.php">Go back to Menu</a>
</body>
</html>
