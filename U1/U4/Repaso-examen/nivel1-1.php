<?php
$password = 'hola1234';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cookies básicas - Ejercicio 1</title>
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inputUser = $_POST['user'];
    $inputPass = $_POST['password'];
    if ($inputPass != $password) {
        echo '<form action="" method="post">
            <label for="user">User:</label>
            <input type="text" name="user" id="user"><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password"><br>
            <button type="submit">Send</button>
        </form>';
        exit();
    }
    setcookie('user', htmlspecialchars($inputUser), time() + (86400 * 30), "/");
    header('location: ./nivel1-1.php');
    exit();
}
if (isset($_COOKIE['user'])) {
    echo '<h1>Welcome '.htmlspecialchars($_COOKIE['user']).'!</h1>';
} else {
    echo '<form action="" method="post">
            <label for="user">User:</label>
            <input type="text" name="user" id="user"><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password"><br>
            <button type="submit">Send</button>
        </form>';
}
?>
</body>
</html>
