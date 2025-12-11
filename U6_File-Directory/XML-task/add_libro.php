<?php
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
    <title>Añadir libro a XML</title>
</head>
<body>
    <h1>Añadir libro</h1>
    <form method="post">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo">
        <br>
        <label for="autor">Autor:</label>
        <input type="text" name="autor" id="autor">
        <br>
        <label for="isbn">ISBN:</label>
        <input type="number" name="isbn" id="isbn" max="1000000000" min="9999999999">
        <br>
        <label for="editorial">Editorial:</label>
        <input type="text" name="editorial" id="editorial">
        <br>
        <label for="anio_edicion">Año de edición:</label>
        <input type="number" name="anio_edicion" id="anio_edicion" max="2200" min="1000">
        <br>
        <button type="submit">Añadir libro</button>
    </form>
    <a href="Fase4.php">Volver a servicios biblioteca</a>
</body>
</html>