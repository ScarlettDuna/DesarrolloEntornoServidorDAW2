<?php
$cookieTime = date("d/m/Y H:i:s");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cookies básicas - Ejercicio 2</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_COOKIE[$_POST["user"]])) {
        $lastVisit = $_COOKIE[$_POST["user"]];
        setcookie($_POST["user"], $cookieTime, time() + 60);
        echo '<p>Hola de nuevo, '.$_POST["user"].'. Tu última visita fue el ' . $lastVisit . '.</p><br>';
    } else {
        setcookie($_POST["user"], $cookieTime, time() + 60);
        echo '<p>Bienvenido, '.$_POST["user"].'.</p><br>';
    }

} else {
    echo '<h2>¿Quién eres?</h2>
        <form method="post">
        <input type="text" name="user" id="user">
        <button type="submit">Enviar</button>
        </form>';
}
?>

</body>
</html>
