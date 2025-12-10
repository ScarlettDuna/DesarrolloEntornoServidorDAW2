<?php
$xmlDom = new DOMDocument();
$xmlDom->load('libro.xml');
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
    <form action="">
        <select name="librosLibres" id="librosLibres">
            <?php
            foreach ($xmlDom->getElementsByTagName('libro') as $libro) {
                $libro =
            }
            ?>
        </select>
    </form>
</body>
</html>
