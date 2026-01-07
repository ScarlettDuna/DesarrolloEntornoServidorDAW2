<?php
include 'funciones.php';
$xmlDom = new DOMDocument();
$xmlDom->load('biblioteca.xml');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $datosArray = [$_POST['titulo'], $_POST['autor'], $_POST['isbn'], $_POST['editorial'], $_POST['anio_edicion']];
    addLibro($xmlDom, $datosArray);
    header('Location: add_libro.php');
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Add book to XML</title>
</head>
<body>
    <h1>Add book to XML</h1>
    <form method="post">
        <label for="titulo">Title:</label>
        <input type="text" name="titulo" id="titulo">
        <br>
        <label for="autor">Author:</label>
        <input type="text" name="autor" id="autor">
        <br>
        <label for="isbn">ISBN:</label>
        <input type="number" name="isbn" id="isbn" min="1000000000" max="9999999999">
        <br>
        <label for="editorial">Publisher:</label>
        <input type="text" name="editorial" id="editorial">
        <br>
        <label for="anio_edicion">Year:</label>
        <input type="number" name="anio_edicion" id="anio_edicion" max="2200" min="1000">
        <br>
        <button type="submit">Add Book</button>
    </form>
    <a href="xml_menu.php">Return to menu</a>
</body>
</html>