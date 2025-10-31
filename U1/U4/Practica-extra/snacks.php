<?php
// página principal con una lista de snacks (papas, galletas, refrescos, etc.).
// Cada snack tendrá un botón “Agregar al carrito”.
session_start();
if (!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $snack = $_POST['snacks'];
    $qty = (int)$_POST['quantity'];

    if (isset($_SESSION['cart'][$snack])) {
        $_SESSION['cart'][$snack] += $qty;
    } else {
        $_SESSION['cart'][$snack] = $qty;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snack shop - Select</title>
</head>
<body>
    <h1>Snack shop</h1>
    <form method="post">
        <label for="snacks">Choose a snack:</label>
        <select name="snacks" >
            <option value="Crisps">Crisps</option>
            <option value="Cheetos">Cheetos</option>
            <option value="Donuts">Donuts</option>
            <option value="Bakery">Bakery</option>
            <option value="Banana">Banana</option>
            <option value="Apple">Apple</option>
        </select>
        <input type="number" name="quantity" min="0" max="10">
        <button type="submit">Add to cart</button>
    </form>
    <h2>Carrito actual:</h2>
    <ol>
        <?php 
        foreach($_SESSION['cart'] as $item => $qty) {
            echo "<li>$item: $qty</li>";
        }
        ?>
    </ol>
    <a href="cart.php">Ir al carrito</a>

</body>
</html>