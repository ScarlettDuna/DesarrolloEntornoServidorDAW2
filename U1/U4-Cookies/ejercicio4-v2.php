<?php
session_start();

$favorites = [];
$user = $_SESSION['user'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $isLogin = isset($_POST['user']) && isset($_POST['pass']);
    $isFavoritesSubmit = !$isLogin;

    if ($isLogin) {
        // Login → guardar user en sesión
        $_SESSION['user'] = $_POST['user'];
        $user = $_SESSION['user'];

        // cargar cookie si existe
        if (isset($_COOKIE[$user])) {
            $favorites = explode('|', $_COOKIE[$user]);
        }
    }
    // Guardar favoritos
    if ($isFavoritesSubmit) {
        $favorites = [];

        foreach ($_POST as $value) {
            $favorites[] = $value;
        }
        setcookie($user, implode('|', $favorites), time() + 86400 * 30, "/");
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 4 - Save Cookies</title>
</head>
<body>

<?php if ($user === null): ?>

    <form method="post">
        <h3>Log in to save your favorites</h3>

        <label for="user">User</label>
        <input type="text" name="user" id="user" required><br>

        <label for="pass">Password</label>
        <input type="password" name="pass" id="pass" required><br>

        <button type="submit">Log in</button>
    </form>

<?php else: ?>

    <h3>Your favorites</h3>

    <form method="post">

        <input type="checkbox" id="blueJeans" name="blueJeans" value="blueJeans"
            <?php if (in_array("blueJeans", $favorites)) echo "checked"; ?>>
        <label for="blueJeans"> Blue jeans</label><br>

        <input type="checkbox" id="whiteJeans" name="whiteJeans" value="whiteJeans"
            <?php if (in_array("whiteJeans", $favorites)) echo "checked"; ?>>
        <label for="whiteJeans"> White Jeans</label><br>

        <input type="checkbox" id="redShoes" name="redShoes" value="redShoes"
            <?php if (in_array("redShoes", $favorites)) echo "checked"; ?>>
        <label for="redShoes"> Red Shoes</label><br>

        <input type="checkbox" id="blueShoes" name="blueShoes" value="blueShoes"
            <?php if (in_array("blueShoes", $favorites)) echo "checked"; ?>>
        <label for="blueShoes"> Blue Shoes</label><br>

        <input type="checkbox" id="whiteShirt" name="whiteShirt" value="whiteShirt"
            <?php if (in_array("whiteShirt", $favorites)) echo "checked"; ?>>
        <label for="whiteShirt"> White Shirt</label><br>

        <input type="checkbox" id="redShirt" name="redShirt" value="redShirt"
            <?php if (in_array("redShirt", $favorites)) echo "checked"; ?>>
        <label for="redShirt"> Red Shirt</label><br>

        <button type="submit">Save favorites</button>
    </form>

<?php endif; ?>

</body>
</html>
