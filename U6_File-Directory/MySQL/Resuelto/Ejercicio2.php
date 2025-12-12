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
                width: 1000px;
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
                margin-right: 10px;
                width: 18.5%;
            }
            .inputSubmit {
                margin: 15px auto;
                width: 10%;
                padding: 5px;
                cursor: pointer;
                background-color: azure;
            }
        </style>

        <?php
            //Conexion BBDD
            
            $Conexion = mysqli_connect("localhost", "root", "", "ropa");
            
            mysqli_select_db($Conexion, "ropa") or die ("No se puede seleccionar la BBDD.");
            
            $Size = "4";

            $Result2 = mysqli_query($Conexion, "Select * FROM camiseta WHERE talla=$Size");
            
            if (mysqli_connect_errno()) {
                printf("<p>Conexión fallida: </p>", mysqli_connect_error());
                exit();
            }

            $NumberRows = mysqli_num_rows($Result2);
        ?>

        <h3>
            Crear nuevo registro
        </h3>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" class="Box">
            <label for="size" class="labelBox">Talla:</label>
            <input name="size" type="text" class="inputBox">
            <label for="price" class="labelBox">Precio:</label>
            <input name="price" type="text" class="inputBox">
            <label for="brand" class="labelBox">Marca:</label>
            <input name="brand" type="text" class="inputBox">
            <label for="color" class="labelBox">Color:</label>
            <input name="color" type="text" class="inputBox">
            <input name="submit" type="submit" class="inputSubmit" value="Registrar">
        </form>

        <?php
            $Conexion = mysqli_connect("localhost", "root", "", "ropa");
                        
            mysqli_select_db($Conexion, "ropa") or die ("No se puede seleccionar la BBDD.");

            if (isset($_POST["size"])) {
                $Size = $_POST["size"];
            }
            if (isset($_POST["price"])) {
                $Price = $_POST["price"];
            }
            if (isset($_POST["brand"])) {
                $Brand = $_POST["brand"];
            }
            if (isset($_POST["color"])) {
                $Color = $_POST["color"];
            }
            $rs = mysqli_query($Conexion, "SELECT MAX(id) AS id FROM pantalon");
            $id = 0;
            if ($row = mysqli_fetch_row($rs)) {
                $id = trim($row[0]+1);
            }

            if (isset($_POST["submit"])) {
                $Insert = "INSERT INTO pantalon(id, talla, precio, marca, color) VALUES('$id', '$Size', '$Price', '$Brand', '$Color')";
                $Result = mysqli_query($Conexion, $Insert);

                /*if ($Result) {
                    echo "<script>alert('El registro se ha introducido exitosamente.'):
                    window.location='/Ejercicio2.php'</script>";
                }*/
            }

            $Insert2 = "Select * FROM pantalon";
            $Result2 = mysqli_query($Conexion, $Insert2);

            $NumberRows = mysqli_num_rows($Result2);
            
            if (mysqli_connect_errno()) {
                printf("<p>Conexión fallida: </p>", mysqli_connect_error());
                exit();
            }
        ?>

        <h3>
            Pantalón &darr;
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
                } else {
                    echo "<tr>";
                    echo "<td colspan='5' align='center'>No se ha encontrado ningun registro (con la talla indicada)</td>"; 
                    echo "</tr>";
                }
            ?>

        </table>

    </body>
</html>