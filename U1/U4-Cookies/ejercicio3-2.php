<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /*
    si hay cookie con nombre del usuario:
        decodificar cookie → carrito_antiguo
        fusionar carrito_antiguo con carrito_actual
        guardar resultado en $_SESSION['shopping_cart']

    */
    $_SESSION['user'] = $_POST['user'];
    if (isset($_COOKIE[$_POST['user']])) {
        $decoded_cart = json_decode($_COOKIE[$_POST['user']], true);
        foreach ($decoded_cart as $key => $value) {
            if (isset($_SESSION['shopping_cart'][$key])) {
                $_SESSION['shopping_cart'][$key] += $value;
            } else {
                $_SESSION['shopping_cart'][$key] = $value;
            }
        }
    }
    header("Location: ejercicio3-3.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 3 - Log in</title>
</head>
<body>
    <h2>Lon in your account</h2>
    <form method="post">
        <label for="user">User</label>
        <input type="text" name="user" id="user"><br>
        <label for="pass">Password</label>
        <input type="password" name="pass" id="pass"><br>
        <button type="submit">Log in</button>
    </form>

</body>
</html>
