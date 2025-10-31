<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['client'] = [
        'name' => $_POST['full_name'] ?? '',
        'address' => $_POST['address'] ?? '',
        'tel' => $_POST['telph'] ?? ''
    ];
    header("Location: ./E02-3.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothes 4 Devs</title>
</head>
<body>
    <h3>Your Data</h3>
    <form action="./E02-1.php" method="get">
        <button>Volver a paso 1</button>
    </form>
    <form method="post">
        <label for="full_name">Name and Surname</label>
        <input type="text" name="full_name" id="full_name" value="<?php echo $_SESSION['client']['name'] ?? ''; ?>" required>
        <br>
        <label for="address">Address</label>
        <input type="text" name="address" id="address" value="<?php echo $_SESSION['client']['address'] ?? ''; ?>" required>
        <br>
        <label for="telph">Telephone</label>
        <input type="tel" name="telph" id="telph" value="<?php echo $_SESSION['client']['tel'] ?? ''; ?>" required>
        <br>
        <button type="submit">Continue</button>
    </form>
</body>
</html>