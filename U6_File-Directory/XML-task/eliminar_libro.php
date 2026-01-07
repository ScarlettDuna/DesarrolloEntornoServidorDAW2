<?php
include_once 'funciones.php';
$xmlDom = new DOMDocument();
$xmlDom->load('biblioteca.xml');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    removeLibro($xmlDom, $_POST['libroEliminar']);
    header("Location: eliminar_libro.php");
    exit;
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Delete Book</title>
</head>
<body>
<h1>Delete Book from XML</h1>
<form method="post">
    <select name="libroEliminar" id="libroEliminar">
        <?php
        foreach ($xmlDom->getElementsByTagName('libro') as $libro) {
            $titulo = $libro->getElementsByTagName('titulo')->item(0)->nodeValue;
            $autor = $libro->getElementsByTagName('autor')->item(0)->nodeValue;
            $isbn = $libro->getElementsByTagName('isbn')->item(0)->nodeValue;
            $estado = $libro->getElementsByTagName('estado')->item(0)->nodeValue;
            if ($estado == 'libre') {
                echo '<option value="' . $isbn . '">' . $titulo . ' - ' . $autor . '</option>';
            }
        }
        ?>
    </select>
    <button type="submit">Delete Book</button>
</form>
<a href="xml_menu.php">Return to menu</a>
</body>
</html>
