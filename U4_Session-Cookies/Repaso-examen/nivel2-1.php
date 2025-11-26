<?php
/*Permite varios usuarios:
    Crea una cookie “índice de usuarios” (users_index) y una cookie por cada usuario (user_<nombre> = hora última conexión).
    Muestra la lista de usuarios que han iniciado sesión y su última visita.*/
$cookieTime = date("d/m/Y H:i:s");

// Índice de usuarios (solo nombres)
$users_index = [];
if (isset($_COOKIE['users_index'])) {
    $users_index = explode(';', $_COOKIE['users_index']);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Multiples cookies - Ejercicio 3</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = $_POST['user'];

    // ¿Ya existía la cookie de este usuario?
    $yaVisitado = isset($_COOKIE['user_'.$user]);

    // Crear/actualizar cookie con la hora
    setcookie('user_'.$user, $cookieTime, time() + 360);

    // Añadirlo al índice si es nuevo
    if (!$yaVisitado && !in_array($user, $users_index)) {
        $users_index[] = $user;
        setcookie("users_index", implode(";", $users_index), time() + 360);
    }

    // Saludo
    if ($yaVisitado) {
        echo "<p>Hola de nuevo, ".htmlspecialchars($user).".</p>";
    } else {
        echo "<p>Bienvenido, ".htmlspecialchars($user).".</p>";
    }

    // Lista de usuarios + última visita
    if (!empty($users_index)) {
        echo "<h2>Usuarios que han accedido:</h2>";
        foreach ($users_index as $u) {
            if (isset($_COOKIE['user_'.$u])) {
                echo "<p>".htmlspecialchars($u)." → Última visita: ".$_COOKIE['user_'.$u]."</p>";
            } else {
                echo "<p>".htmlspecialchars($u)." → Sin registro todavía</p>";
            }
        }
    }

} else {
    echo '<h2>¿Quién eres?</h2>
        <form method="post">
            <input type="text" name="user">
            <button type="submit">Enviar</button>
        </form>';
}
?>

</body>
</html>
