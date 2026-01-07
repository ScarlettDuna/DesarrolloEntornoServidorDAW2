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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $stmtdelete = $pdo->prepare("DELETE FROM footwear WHERE id=?");
    $stmtdelete->execute([$id]);
    header("Location: db_ej_delFootwear.php");
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
    <title>Delete footwear item</title>
</head>
<body>
    <h1>Delete footwear item</h1>
    <form method="post">
        <label for="id">ID</label>
        <select name="id" id="id" required>
            <?php foreach ($footwear as $footitem) : ?>
                <option value="<?php echo $footitem['id']; ?>"><?php echo $footitem['brand'].' | '.$footitem['color'].' | '.$footitem['size']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Delete item</button>
    </form>
    <a href="./db_ej_menu.php">Go back to Menu</a>
</body>
</html>
