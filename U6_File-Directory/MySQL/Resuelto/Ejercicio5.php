<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>
    <body>
        
        <style>
            table {
                border: 2px solid black;
                width: 30%;
            }
            td {
                border: 1px solid red;
            }
            th {
                border: 1px solid blue;
            }
            .Box {
                width: 450px;
                padding: 10px;
                box-shadow: 2px 2px 2px black;
                background-color:bisque;
                border-top: 1px solid black;
                border-left: 1px solid black;
                display: flex;
                flex-wrap: wrap;
            }
            .inputBox {
                margin-left: 10px;
                margin-right: 20px;
                width: 50%;
            }
            .inputSubmit {
                width: 20%;
                padding: 5px;
                cursor: pointer;
                background-color: azure;
            }
        </style>
        <h3>
            Borrar según la talla seleccionada
        </h3>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" class="Box">
            <label for="name" class="labelBox">Talla a borrar:</label>
            <input name="sizeI" type="text" class="inputBox">
            <input name="submit" type="submit" class="inputSubmit" value="Delete">
        </form>

        <?php
            $Conexion = mysqli_connect("localhost", "root", "", "ropa");
                        
            mysqli_select_db($Conexion, "ropa") or die ("No se puede seleccionar la BBDD.");
            
            if (mysqli_connect_errno()) {
                printf("<p>Conexión fallida: </p>", mysqli_connect_error());
                exit();
            }

            if (isset($_POST["sizeI"])) {
                $Size = $_POST["sizeI"];
            }

            if (isset($_POST["submit"])) {
                $Insert = "DELETE FROM calzado WHERE talla='$Size'";
                $Result = mysqli_query($Conexion, $Insert);
            }

            $Insert2 = "Select * FROM calzado";
            $Result2 = mysqli_query($Conexion, $Insert2);

            $NumberRows = mysqli_num_rows($Result2);
            
            if (mysqli_connect_errno()) {
                printf("<p>Conexión fallida: </p>", mysqli_connect_error());
                exit();
            }
        ?>

        <h3>
            Calzado &darr;
        </h3>
        <table>
            <tr>
                <th>
                    Id
                </th>
                <th>
                    Talla
                </th>
                <th>
                    Precio
                </th>
                <th>
                    Marca
                </th>
                <th>
                    Color
                </th>
            </tr>

            <?php
                // Get fields BBDD
                if ($NumberRows > 0) {
                    for ($i = 0; $i < $NumberRows; $i++) {
                        $Field = mysqli_fetch_array($Result2, MYSQLI_ASSOC);
                        echo "<tr>";
                            echo "<td>" . $Field["id"] . "</td>";
                            echo "<td>" . $Field["talla"] . "</td>";
                            echo "<td>" . $Field["precio"] . "</td>";
                            echo "<td>" . $Field["marca"] . "</td>";
                            echo "<td>" . $Field["color"] . "</td>";
                        echo "</tr>";
                    }
                }
            ?>

        </table>

    </body>
</html>