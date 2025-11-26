<?php
// página principal con una lista de snacks (papas, galletas, refrescos, etc.).
// Cada snack tendrá un botón “Agregar al carrito”.
session_start();
$prices = [
    'Crisps' => 2.95,
    'Cheetos' => 3.00,
    'Donuts' => 3.50,
    'Bakery' => 1.75,
    'Banana' => 1.00,
    'Apple'  => 1.20
];

if (!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
    $_SESSION['favs'] = [];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $snack = $_POST['snacks'];
    $qty = (int)$_POST['quantity'];

    if (isset($_SESSION['cart'][$snack])) {
        $_SESSION['cart'][$snack]['quantity'] += $qty;
    } else {
        $_SESSION['cart'][$snack] = [
            'quantity' => $qty,
            'price' => $prices[$snack]
        ];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snack shop - Select</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1, h3 {
            flex-direction: column;
            text-align: center;
        }
    </style>
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
        <input type="number" name="quantity" min="1" max="10">
        <button type="submit">Add to cart</button>
    </form>
    
    <h2>Carrito actual:</h2>
    <ol>
        <?php 
        foreach($_SESSION['cart'] as $item => $data) {
            echo "<li>$item: {$data['quantity']} (Price: {$data['price']}€)</li>";
        }
        ?>
    </ol>
    <form action="./cart.php" method="get">
        <button type="submit">Go to cart</button>
    </form>

</body>
</html>