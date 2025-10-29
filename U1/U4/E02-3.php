<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['full_name'])) {
    $_SESSION['client'] = [
        'name' => $_POST['full_name'] ?? '',
        'address' => $_POST['address'] ?? '',
        'tel' => $_POST['telph'] ?? ''
    ];
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
    <div class="client">
        <h3>Customer Data</h3>
        <p>Full Name: <?= $_SESSION['client']['name']?></p>
        <p>Address: <?= $_SESSION['client']['address']?></p>
        <p>Telephone: <?= $_SESSION['client']['tel']?></p>
    </div>
    

    <table>
        <thead>
            <th colspan="3">Order Summary</th>
        </thead>
        <tbody>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <?php
                foreach($_SESSION["productos"] as $id => $product){
                    if (isset($product["quantity"]) && $product["quantity"] > 0) {
                        echo ("<tr>
                                <td>".$product['name']."</td>
                                <td>".$product['price']."</td>
                                <td>".$product['quantity']."</td>
                                <td>".($product['quantity'] * $product['price'])."</td>
                            </tr>");
                    }
                }
            ?>
            
        </tbody>
    </table>
    
</body>
<?php
    session_destroy();
?>
</html>