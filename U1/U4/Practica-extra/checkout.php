<?php
// muestra el resumen final (todo lo que hay en la sesión) y un botón **“Vaciar carrito”** que destruye la sesión.
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_unset();
    session_destroy();
    header("Location: snacks.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snack shop - Checkout</title>
        <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h2, h3 {
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
    <h2>Checkout</h2>
    <?php
    if (empty($_SESSION['cart'])) {
        echo "<h3>Your cart is empty, add something delicious!</h3>";
    }
    ?>
    <table border="1" cellpadding="5">
        <thead>
            <th>Item</th>
            <th>Quantity</th>
            <th>Total</th>
        </thead>
        <?php
        $total = 0;
            foreach($_SESSION['cart'] as $item => $data) {
                $subtotal = $data['price'] * $data['quantity'];
                $total += $subtotal;
                echo "<tr><td>$item</td>
                        <td>{$data['quantity']}</td>
                        <td>$subtotal</td></tr>";
            }
        ?>
        <tfoot>
            <tr>
                <td><strong>Total</strong></td>
                <td colspan="3"><?= $total?></td>
            </tr>
        </tfoot>
    </table>   
    <form method="post">
        <button type="submit">Empty cart</button>
    </form>
</body>
<?php

?>
</html>