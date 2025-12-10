<?php
include 'Fase3.php';
$xmlDom = new DOMDocument();
$xmlDom->load('biblioteca.xml');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fechaDevolucionTimestamp = time() + 14 * 24 * 3600;
    $fechaDevolucion = date('d/m/Y', $fechaDevolucionTimestamp);
    prestarLibro($xmlDom, $_POST['librosLibres'], $fechaDevolucion);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prestar libros</title>
</head>
<body>
    <h1>Préstamo de libros</h1>
    <form method="post">
        <select name="librosLibres" id="librosLibres">
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
        <button type="submit">Prestar libro</button>
    </form>
    <a href="Fase4.php">Volver a servicios biblioteca</a>
</body>
</html>
