<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>

    <style>
        h1 {
            margin-top: 12rem;
            margin-left: 29rem;
        }

        button {
            margin-top: 1rem;
            margin-left: 29rem;
        }

        .box {
            display: flex;
            justify-content: space-between;
            border: 1px solid black;
            border-radius: 2rem;
            background-color: lightblue;
            margin-left: 25rem;
            margin-right: 25rem;
            padding: 2rem 7rem;
        }
    </style>
</head>

<body>
    <h1>Reservas</h1>
    <div class="box">
        <div>
            <?php
            if (isset($_POST['seleccionar'])) {
                $datos = simplexml_load_file("biblioteca.xml");
                $titulos = $datos->xpath("//titulo");
                $reservas = $_POST["reservas"];
                echo "Has reservado estos libros: </p><ul>";
                foreach ($reservas as $clave => $valor) {
                    echo "<li>" . $valor . "</li>";
                    $posiciones[] = array_search($valor, $titulos);
                }
                echo '</ul></div><hr style="width:1px; height:auto; background-color:black"><div>';
                $libros = new SimpleXMLElement('biblioteca.xml', 0, true);
                for ($i = 0; $i < count($posiciones); $i++) {
                    $libros->genero->libro[$posiciones[$i]]->estado = "prestado";
                    $libros->genero->libro[$posiciones[$i]]->addChild('fecha_devolución', date("d-m-o", time() + 1209600));
                    $mensaje []= 'Novela- ' . $libros->genero->libro[$posiciones[$i]]->titulo . " Reservada.  ";
                    echo 'Novela- ' . $libros->genero->libro[$posiciones[$i]]->titulo . " Reservada.<br>";
                    $mensaje [] = "Fecha de devolución: " . $libros->genero->libro[$posiciones[$i]]->fecha_devolucion . "." . PHP_EOL;
                    echo "Fecha de devolución: " . $libros->genero->libro[$posiciones[$i]]->fecha_devolucion . ".<br><br>";
                }

                if(fopen("fichero_salida.txt", "a") === FALSE){
                    $res = file_put_contents("fichero_salida.txt", $mensaje);
                } else{
                    $file = fopen("fichero_salida.txt", "a");
                    fwrite($file, implode(PHP_EOL,$mensaje));
                    fwrite($file,PHP_EOL);
                }
                $libros->saveXML('biblioteca.xml');
            } ?>
        </div>
    </div>
    <button onclick="location.href='biblioteca.php'">Volver a reservar</button>
</body>

</html>