<?php
session_start();
$prod = ["jeans1" => [
            "name" => "Light Blue Jeans",
            "price" => 10.99,
            "img" => "./imgs/jeans1.jpg",],
        "pants2" => [
            "name" => "Black dressing pants for women",
            "price" => 15.25,
            "img" => "./imgs/pants1.webp",],
        "pants3" => [
            "name" => "Beige dressing pants",
            "price" => 14.99,
            "img" => "./imgs/pants2.webp"],
        "shirt1" => [
            "name" => "Black Dev shirt",
            "price" => 7.99,
            "img" => "./imgs/shirt-dev1.jfif"],
        "shirt2" => [
            "name" => "Gray Xmax Dev shirt",
            "price" => 9.99,
            "img" => "./imgs/shirt-dev2.jfif"],
        "shirt3" => [
            "name" => "Red QA shirt",
            "price" => 9.99,
            "img" => "./imgs/shirt-qa.webp"],
        "shirt4" => [
            "name" => "Dark blue dev shirt",
            "price" => 8.99,
            "img" => "./imgs/While-Alive-eat-sleep-NAVY.webp"],
        "sweater1" => [
            "name" => "Xmas sweater",
            "price" => 15.99,
            "img" => "./imgs/sweater2.webp"],
        "sweater2" => [
            "name" => "Xmas sweater 2",
            "price" => 14.99,
            "img" => "./imgs/sweater3.webp"]
        ];

if (!isset($_SESSION["productos"])){
    foreach ($prod as $id => $p) {
        $prod[$id]['quantity'] = 0;
    }
    $_SESSION["productos"] = $prod;
} 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST['quantity'] as $id => $cantidad) {
        $_SESSION['productos'][$id]['quantity'] = (int)$cantidad;
    }
    header("Location: ./E02-2.php");
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
        img {
            width: 250px;
        }
        table {
            padding: 15px;
            justify-self: center;
        }
        td {
            text-align: center;
            vertical-align: middle;
        }
        td select {
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <h1>Clothes for devs</h1>
    <h3>Confy and motivating</h3>
    <form method="post">
        <table>
            <thead>
                <th>Image</th>
                <th>Description</th>
                <th>Price</th>
                <th>Selec Quantity</th>
            </thead>
            <tbody>
                <?php
                    foreach ($_SESSION['productos'] as $id => $p) {
                        $selectedQty = $p['quantity'] ?? 0; // Valor guardado o 0

                        // Generar las opciones del select
                        $options = '';
                        for ($i = 0; $i <= 4; $i++) {
                            $selected = ($i == $selectedQty) ? 'selected' : '';
                            $options .= "<option value='$i' $selected>$i</option>";
                        }

                        // Mostrar la fila
                        echo "
                            <tr>
                                <td><img src='{$p['img']}' alt='{$p['name']}'></td>
                                <td>{$p['name']}</td>
                                <td>{$p['price']}€</td>
                                <td>
                                    <select name='quantity[$id]'>
                                        $options
                                    </select>
                                </td>
                            </tr>";
                    }
                    ?>
            </tbody>
        </table>
        <button type="submit">continue</button>
    </form>
</body>
</html>