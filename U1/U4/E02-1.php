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
    $_SESSION["productos"] = $prod;
    echo "aqui";
} else {
    print_r($_SESSION["productos"]);
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
    <form action="./E02-2.php" method="post">
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
                        echo ("<tr>
                                <td><img src=".$p['img']." alt=".$p['name']."></td>
                                <td>".$p['name']."</td>
                                <td>".$p['price']."€</td>
                                <td>
                                    <select name='quantity[$id]' >
                                        <option value='0'>0</option>
                                        <option value='1'>1</option>
                                        <option value='2'>2</option>
                                        <option value='3'>3</option>
                                        <option value='4'>4</option>
                                    </select></td>
                                </td>
                            </tr>");
                    }
                ?>
            </tbody>
        </table>
        <button type="submit">continue</button>
    </form>
</body>
</html>