<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Prueba Arrays</h1>
    <?php
        $notas = [ "Manuel" => ["Matemáticas" => 8, "Física" => 7, "Química" => 6],
                "Ana"    => ["Matemáticas" => 9, "Física" => 6, "Química" => 5],
                "Luis"   => ["Matemáticas" => 5, "Física" => 8, "Química" => 7]];
        print_r($notas);

        echo "<br>";
        $notas2 = array("Manuel" => array("Mates" => 8), "Ana" => array("Mates" => 9, "Física" => 6, "Química" => 2), "Luis" => array("Mates" => 5, "Física" => 8, "Química" => 7));     
        print_r($notas2);
    ?>
    </body>
</html>      