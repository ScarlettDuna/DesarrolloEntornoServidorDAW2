<?php
// At the end of the previous session exercise, save the user's shopping cart in a cookie.
// We can have multiple user shopping carts saved with the selected products from each category.
// The cookie contains the user's name and then the products from the array created using implode/explode
// When the user logs in again, if there is a cookie containing their old shopping cart from the last time they accessed the site
session_start();
if (!isset($_SESSION['shopping_cart'])) {
    $_SESSION['shopping_cart'] = array();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST as $item => $quantity) {
        if ($quantity > 0) {
            $_SESSION['shopping_cart'][$item] = (int)$quantity;
        }
    }
    header("Location: ejercicio3-2.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 3 - Shopping </title>
</head>
<body>
    <h2>Welcome to your shopping page</h2>
    <form method="post">
        <h3>Jeans</h3>
        <label for="blue-jeans">Blue Jeans</label>
        <input type="number" name="blue-jeans" id="blue-jeans"><br>
        <label for="black-jeans">Black Jeans</label>
        <input type="number" name="black-jeans" id="black-jeans"><br>
        <label for="while-pants">White pants</label>
        <input type="number" name="while-pants" id="while-pants"><br>
        <h3>Shirts</h3>
        <label for="blue-shirt">Blue Shirt</label>
        <input type="number" name="blue-shirt" id="blue-shirt"><br>
        <label for="black-shirt">Black Shirt</label>
        <input type="number" name="black-shirt" id="black-shirt"><br>
        <label for="red-shirt">Red shirt</label>
        <input type="number" name="red-shirt" id="red-shirt"><br>
        <h3>Jumper</h3>
        <label for="blue-jumper">Blue Jumper</label>
        <input type="number" name="blue-jumper" id="blue-jumper"><br>
        <label for="black-jumper">Black Jumper</label>
        <input type="number" name="black-jumper" id="black-jumper"><br>
        <label for="red-jumper">Red Jumper</label>
        <input type="number" name="red-jumper" id="red-jumper"><br>
        <button type="submit">Add to cart</button>
    </form>

</body>
</html>