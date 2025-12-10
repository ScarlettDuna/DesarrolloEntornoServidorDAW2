<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca online</title>
    <style>
        .caja {
            display: flex;
            justify-content: space-around;
            padding-top: 5rem;
        }

        .formulario {
            margin: 5rem;
        }

        .formulario select {
            height: 12rem;
        }

        .lista {
            padding: 2rem;
            border: 1px solid black;
            border-radius: 2rem;
            background-color: lightblue;
        }
    </style>
</head>

<body>
    <?php

    $doc = new DOMDocument();
    $doc->load('biblioteca.xml');
    $res = $doc->schemaValidate('biblioteca.xsd');

    if ($res) {
        $valido = true;
    } else {
        $valido = false;
    }

    if ($valido = 1) {

    ?>
        <div class="caja">
            <div class="lista">
            <?php
            $transformation = new DOMDocument();
            $transformation->load('biblioteca.xsl');

            $procesador = new XSLTProcessor();
            $procesador->importStylesheet($transformation);

            $transformada = $procesador->transformToXml($doc);
            echo $transformada;
        }
            ?>
            </div>
            <div class="formulario">
                <h2>Reservar</h2>
                <form method="post" action="reserva.php" enctype="multipart/form-data">
                    <label for="reservas[]">Seleccione los libros que desea reservar:</label><br><br>
                    <select name="reservas[]" multiple>
                        <?php
                        $datos = simplexml_load_file("biblioteca.xml");
                        $titulosFiltro = $datos->xpath("/biblioteca/genero/libro[estado='libre']/titulo");
                        foreach ($titulosFiltro as $valor) {
                            echo '<option value="' . $valor . '" selected>' . $valor . '</option>';
                        }
                        ?>
                    </select>
                    <br><br>
                    <input type="submit" name="seleccionar" value="Seleccionar">
                </form>
            </div>
        </div>
</body>

</html>