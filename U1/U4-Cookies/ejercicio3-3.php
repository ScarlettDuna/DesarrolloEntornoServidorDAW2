<?php
session_start();
if (isset($_GET['action']) && $_GET['action'] === 'destroy') {
    $shopping_cart = json_encode($_SESSION["shopping_cart"]);
    setcookie($_SESSION['user'], $shopping_cart, time() + (86400 * 30), '/');
    session_unset();
    session_destroy();
    header("Location: ejercicio3.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 3 - Last step</title>
</head>
<body>
    <?php
    echo "<h2>Welcome dear ".$_SESSION['user']."!</h2>";
    echo "<h4>Your shopping cart contains:</h4>";
    foreach ($_SESSION['shopping_cart'] as $item => $quantity) {
        echo $item . ": " . $quantity . "<br>";
    }
    ?>
    <form method="get">
        <button type="submit" name="action" value="destroy">Destroy session / Delete cart</button>
    </form>
</body>
</html>