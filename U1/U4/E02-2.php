<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST['quantity'] as $id => $cantidad) {
        if ($cantidad > 0) {
            $_SESSION['productos'][$id]['quantity'] = $cantidad;
        }
    }
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
    <form action="./E02-3.php" method="post">
        <label for="full_name">Name and Surname</label>
        <input type="text" name="full_name" id="full_name" required>
        <br>
        <label for="address">Address</label>
        <input type="text" name="address" id="address" required>
        <br>
        <label for="telph">Telephone</label>
        <input type="tel" name="telph" id="telph" required>
        <br>
        <button type="submit">Continue</button>
    </form>
</body>
</html>