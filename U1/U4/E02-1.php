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

        ];
$_SESSION["productos"] = $prod;
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
                <tr>
                    <td><img src="./imgs/jeans1.jpg" alt="light blue jeans"></td>
                    <td>Light Blue Jeans</td>
                    <td>10.99</td>
                    <td>
                        <select name="jeans1Qquantity">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><img src="./imgs/pants1.webp" alt="black woman pants"></td>
                    <td>Black dressing pants for women</td>
                    <td>15.25</td>
                    <td>
                        <select name="pants2[quantity]">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><img src="./imgs/pants2.webp" alt="beige pants"></td>
                    <td>Beige dressing pants</td>
                    <td>14.99</td>
                    <td>
                        <select name="quantity" id="pants3Q">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><img src="./imgs/shirt-dev1.jfif" alt="black shirt"></td>
                    <td>Black Dev shirt</td>
                    <td>7.99</td>
                    <td>
                        <select name="quantity" id="shirt1Q">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><img src="./imgs/shirt-dev2.jfif" alt="greay shirt" ></td>
                    <td>Gray Xmax Dev shirt</td>
                    <td>9.99</td>
                    <td>
                        <select name="quantity" id="shirt2Q">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><img src="./imgs/shirt-qa.webp" alt="red shirt" ></td>
                    <td>Red QA shirt</td>
                    <td>9.99</td>
                    <td>
                        <select name="quantity" id="shirt3Q">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><img src="./imgs/While-Alive-eat-sleep-NAVY.webp" alt="dark blue shirt"></td>
                    <td>Dark blue dev shirt</td>
                    <td>8.99</td>
                    <td>
                        <select name="quantity" id="shirt4Q">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select></td>
                    </td>
                </tr>
                <tr>
                    <td><img src="./imgs/sweater2.webp" alt="xmas sweater" ></td>
                    <td>Xmas sweater</td>
                    <td>15.99</td>
                    <td>
                        <select name="quantity" id="sweater1Q">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select></td>
                    </td>
                </tr>
                <tr>
                    <td><img src="./imgs/sweater3.webp" alt="xmas sweater 2"></td>
                    <td>Xmas sweater 2</td>
                    <td>14.99</td>
                    <td>
                        <select name="quantity" id="sweater2Q">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select></td>
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="submit">continue</button>
    </form>
</body>
</html>