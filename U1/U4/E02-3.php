<?php
session_start();
if (isset($_GET['new_order'])) {
    session_destroy();
    header('Location: ./E02-1.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothes 4 Devs</title>
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
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <h2>Your Order</h2>
    <form action="./E02-1.php" method="get">
        <button>Volver a paso 1</button>
    </form>
    <form action="./E02-2.php" method="get">
        <button>Volver a paso 2</button>
    </form>
    
    <div class="client">
        <h3>Customer Data</h3>
        <p>Full Name: <?= $_SESSION['client']['name']?></p>
        <p>Address: <?= $_SESSION['client']['address']?></p>
        <p>Telephone: <?= $_SESSION['client']['tel']?></p>
    </div>
    

    <table>
        <thead>
            <th colspan="4">Order Summary</th>
        </thead>
        <tbody>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <?php
            $totalGeneral = 0;
                foreach($_SESSION["productos"] as $id => $product){
                    if (isset($product["quantity"]) && $product["quantity"] > 0) {
                        echo ("<tr>
                                <td>".$product['name']."</td>
                                <td>".$product['price']."</td>
                                <td>".$product['quantity']."</td>
                                <td>".($product['quantity'] * $product['price'])."</td>
                            </tr>");
                        $totalGeneral += ($product['quantity'] * $product['price']);
                    }
                }
            ?>
            
        </tbody>
        <tfoot>
            <td colspan="3">Total</td>
            <td><?=$totalGeneral ?></td>
        </tfoot>
    </table>
    <form action="./E02-1.php" method="get">
        <button type="submit" name="new_order" value="1">Nueva compra</button>
    </form>
</body>
</html>