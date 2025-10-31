<?php 
// muestra los snacks añadidos a la sesión y permite eliminarlos uno por uno.
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    unset($_SESSION['cart'][$_GET['remove']]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snack shop - Shopping Cart</title>
</head>
<body>
    <h1>Shopping Cart</h1>
    <form method="get">
        <table border="1" cellpadding="5">
            <thead>
                <th>Item</th>
                <th>Quantity</th>
            </thead>
            <?php 
                foreach($_SESSION['cart'] as $item => $qty) {
                    echo "<tr><td>$item</td>
                            <td>$qty</td>
                            <td><button value=".$item.">Remove item</button></tr>";
                }
            ?>
        </table>    
    </form>
</body>
</html>