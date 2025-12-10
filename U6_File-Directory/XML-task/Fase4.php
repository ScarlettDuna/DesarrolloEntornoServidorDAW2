<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['prestar'])) {
        header('Location: prestar_libro.php');
        exit;
    }
    if (isset($_POST['devolver'])) {
        header('Location: devolver_libro.php');
        exit;
    }
    if (isset($_POST['add'])) {
        header('Location: add_libro.php');
        exit;
    }
    if (isset($_POST['eliminar'])) {
        header('Location: eliminar_libro.php');
        exit;
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
    <title>Document</title>
</head>
<body>
<h1>Servicio de biblioteca online</h1>
<h3>¿Qué desea hacer?</h3>
<form method="post">
    <button type="submit" name="prestar">Prestar libro</button>
    <button type="submit" name="devolver">Devolver libro</button>
    <button type="submit" name="add">Añadir libro</button>
    <button type="submit" name="eliminar">Eliminar libro</button>
</form>
</body>
</html>
