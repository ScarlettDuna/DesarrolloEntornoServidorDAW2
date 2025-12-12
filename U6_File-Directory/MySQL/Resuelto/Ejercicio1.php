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
                margin-bottom: 30px;
            }
            .inputBox {
                margin-left: 10px;
                margin-right: 20px;
                width: 50%;
            }
            .inputSubmit {
                margin: 5px auto;
                width: 25%;
                padding: 7px;
                cursor: pointer;
                background-color:floralwhite;
            }.inputSubmitv2 {
                margin: 10px auto;
                margin-right: 20px;
                width: 7%;
                padding: 5px;
                cursor: pointer;
                background-color:floralwhite;
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

            $idInput=0;
        ?>

        <h3>
            Editar registro
        </h3>
        <form method="POST" class="Box">
            <label for="id" class="labelBox">Id a editar:</label>
            <input name="idInput" type="text" class="inputBox">
            <input name="submit" type="submit" class="inputSubmit" value="Seleccionar">
        </form>

        <?php
            if (isset($_POST["idInput"])) {
                $idInput = $_POST["idInput"];
                setcookie("idInput", $idInput);
            }

            if (isset($_POST["submit"])) {
            ?>
                <br>
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
                $Insert = "SELECT * FROM calzado WHERE id = '$idInput'";
                $Result = mysqli_query($Conexion, $Insert);
                $NumberRows = mysqli_num_rows($Result);
                if ($NumberRows > 0) {
                    for ($i = 0; $i < $NumberRows; $i++) {
                        $Field = mysqli_fetch_array($Result, MYSQLI_ASSOC);
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
                <br>
                <p>¿Desea modificar el registro marcado?<br>
                <form method="POST">
                    <input name="submitX" type="submit" class="inputSubmitv2" value="Modificar">
                    <input name="submitZ" type="submit" class="inputSubmitv2" value="No modificar">
                </form>
                
                <?php
            }
            ?>
        <?php
                if (isset($_POST["submitX"])) {
                ?>  
                    <form method="POST">
                        <label for="name" class="labelBox"><p>Nueva talla:</label>
                        <input name="sizeI" type="text" class="inputBoxv2">
                        <label for="name" class="labelBox"><p>Nuevo precio:</label>
                        <input name="priceI" type="text" class="inputBoxv2">
                        <label for="name" class="labelBox"><p>Nueva marca:</label>
                        <input name="brandI" type="text" class="inputBoxv2">
                        <label for="name" class="labelBox"><p>Nuevo color:</label>
                        <input name="colorI" type="text" class="inputBoxv2">
                        <br><br>
                        <input name="submitXYZ" type="submit" class="inputSubmitv2" value="Confirmar">
                    </form>
                <?php
                    if (isset($_POST["sizeI"])) {
                        $Size = $_POST["sizeI"];
                    }
                    if (isset($_POST["priceI"])) {
                        $Price = $_POST["priceI"];
                    }
                    if (isset($_POST["brandI"])) {
                        $Brand = $_POST["brandI"];
                    }
                    if (isset($_POST["colorI"])) {
                        $Color = $_POST["colorI"];
                    }
                    ?>
                    <?php
                }
                if (isset($_POST["submitXYZ"])) {
                    if (isset($_POST["sizeI"])) {
                        $Size = $_POST["sizeI"];
                    }
                    if (isset($_POST["priceI"])) {
                        $Price = $_POST["priceI"];
                    }
                    if (isset($_POST["brandI"])) {
                        $Brand = $_POST["brandI"];
                    }
                    if (isset($_POST["colorI"])) {
                        $Color = $_POST["colorI"];
                    }
                    $Insert3 = "UPDATE calzado SET talla = " . $Size . ', precio = ' . $Price . ', marca = ' . $Brand . ', color = "' . $Color . '" WHERE id = ' . $_COOKIE["idInput"];
                    $Result3 = mysqli_query($Conexion, $Insert3);
                }

                $Insert2 = "Select * FROM calzado";
                $Result2 = mysqli_query($Conexion, $Insert2);

                $NumberRows = mysqli_num_rows($Result2);
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
                } else {
                    echo "<tr>";
                    echo "<td colspan='5' align='center'>No se ha encontrado ningun registro (con la talla indicada)</td>"; 
                    echo "</tr>";
                }
            ?>

        </table>

    </body>
</html>