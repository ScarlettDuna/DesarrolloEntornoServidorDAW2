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
                width: 17%;
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
            
            if (mysqli_connect_errno()) {
                printf("<p>Conexión fallida: </p>", mysqli_connect_error());
                exit();
            }
        ?>

        <h3>
            Crear nuevo registro en fecha actual
        </h3>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" class="Box">
            <label for="pers" class="labelBox">Persona:</label>
            <input name="pers" type="text" class="inputBox">
            <label for="pant" class="labelBox">Pantalón:</label>
            <input name="pant" type="text" class="inputBox">
            <label for="cam" class="labelBox">Camiseta:</label>
            <input name="cam" type="text" class="inputBox">
            <label for="cal" class="labelBox">Calzado:</label>
            <input name="cal" type="text" class="inputBox">
            <input name="submit" type="submit" class="inputSubmit" value="Registrar">
        </form>

        <?php
            $Conexion = mysqli_connect("localhost", "root", "", "ropa");
                        
            mysqli_select_db($Conexion, "ropa") or die ("No se puede seleccionar la BBDD.");

            if (isset($_POST["pers"])) {
                $pers = $_POST["pers"];
            }
            if (isset($_POST["pant"])) {
                $pant = $_POST["pant"];
            }
            if (isset($_POST["cam"])) {
                $cam = $_POST["cam"];
            }
            if (isset($_POST["cal"])) {
                $cal = $_POST["cal"];
            }

            if (isset($_POST["submit"])) {
                $Insert = "INSERT INTO llevar(fecha, pers, pantalon, camiseta, calzado) VALUES(now(), '$pers', '$pant', '$cam', '$cal')";
                $Result = mysqli_query($Conexion, $Insert);
            }

            $Insert2 = "Select * FROM llevar";
            $Result2 = mysqli_query($Conexion, $Insert2);
            $NumberRows = mysqli_num_rows($Result2);
        ?>

        <h3>
            Llevar &darr;
        </h3>
        <table>
            <tr>
                <th>
                    Fecha
                </th>
                <th>
                    Persona
                </th>
                <th>
                    Pantalón
                </th>
                <th>
                    Camiseta
                </th>
                <th>
                    Calzado
                </th>
            </tr>

            <?php
                // Get fields BBDD
                if ($NumberRows > 0) {
                    for ($i = 0; $i < $NumberRows; $i++) {
                        $Field = mysqli_fetch_array($Result2, MYSQLI_ASSOC);
                        echo "<tr>";
                            echo "<td>" . $Field["fecha"] . "</td>";
                            echo "<td>" . $Field["pers"] . "</td>";
                            echo "<td>" . $Field["pantalon"] . "</td>";
                            echo "<td>" . $Field["camiseta"] . "</td>";
                            echo "<td>" . $Field["calzado"] . "</td>";
                        echo "</tr>";
                    }
                }
            ?>

        </table>

    </body>
</html>