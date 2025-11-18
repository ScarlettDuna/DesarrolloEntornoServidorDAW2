<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_COOKIE[$_POST['user']])) {
        $cookieName = $_POST['user'];
        $cookieValue = "";
        array_splice($_POST, 0, 2);
        foreach ($_POST as $key => $value) {
            $cookieValue .= $value."|";
        }
        setcookie($cookieName, $cookieValue, time() + (86400 * 30), "/");

    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Exercise 4 - Save Cookies</title>
</head>
<body>
    <h2>Add to Favorites</h2>
    <form action="" method="post">
        <h3>Log in to save your favorites</h3>
        <label for="user">User</label>
        <input type="text" name="user" id="user" required><br>
        <label for="pass">Password</label>
        <input type="password" name="pass" id="pass" required><br>
        <h3>Choose your favorites</h3>
        <input type="checkbox" id="blueJeans" name="blueJeans" value="blueJeans">
        <label for="blueJeans"> Blue jeans</label><br>
        <input type="checkbox" id="whiteShirt" name="whiteShirt" value="whiteShirt">
        <label for="whiteShirt"> White Shirt</label><br>
        <input type="checkbox" id="redShoes" name="redShoes" value="redShoes">
        <label for="redShoes"> Red Shoes</label><br>
        <button type="submit">Add to favorites</button>
    </form>

</body>
</html>
