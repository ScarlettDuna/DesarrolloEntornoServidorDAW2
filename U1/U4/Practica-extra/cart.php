<?php 
// muestra los snacks añadidos a la sesión y permite eliminarlos uno por uno.
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    if (isset($_GET['remove'])) {
        unset($_SESSION['cart'][$_GET['remove']]);
};
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snack shop - Shopping Cart</title>
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
        table {
            padding: 15px;
            justify-self: center;
        }
        td {
            text-align: center;
            min-width: 150px;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <h1>Shopping Cart</h1>
    <form method="get">
        <table border="1" cellpadding="5">
            <thead>
                <th>Item</th>
                <th>Quantity</th>
                <th>Total</th>
            </thead>
            <?php 
                foreach($_SESSION['cart'] as $item => $data) {
                    $total = $data['price'] * $data['quantity'];
                    echo "<tr><td>$item</td>
                            <td>{$data['quantity']}</td>
                            <td>$total</td>
                            <td><button name='remove' value='$item'>Remove item</button></tr>";
                }
            ?>
        </table>   
        
    </form>
    <form action="./checkout.php" method="get">
        <button type="submit">Continue to checkout</button>
    </form>
</body>
</html>