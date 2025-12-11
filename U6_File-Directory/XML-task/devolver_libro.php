<?php
include 'Fase3.php';
$xmlDom = new DOMDocument();
$xmlDom->load('biblioteca.xml');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    devolverLibro($xmlDom, $_POST['librosPrestados']);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Devolver libro</title>
</head>
<body>
<h1>Devolución de libros</h1>
<form method="post">
    <select name="librosPrestados" id="librosPrestados">
        <?php
        foreach ($xmlDom->getElementsByTagName('libro') as $libro) {
            $titulo = $libro->getElementsByTagName('titulo')->item(0)->nodeValue;
            $autor = $libro->getElementsByTagName('autor')->item(0)->nodeValue;
            $isbn = $libro->getElementsByTagName('isbn')->item(0)->nodeValue;
            $estado = $libro->getElementsByTagName('estado')->item(0)->nodeValue;
            if ($estado == 'prestado') {
                echo '<option value="' . $isbn . '">' . $titulo . ' - ' . $autor . '</option>';
            }
        }
        ?>
    </select>
    <button type="submit">Devolver libro</button>
</form>
<a href="Fase4.php">Volver a servicios biblioteca</a>
</body>
</html>
