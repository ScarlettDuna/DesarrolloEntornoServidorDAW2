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
        </style>

        <?php
            //Conexion BBDD
            
            $Conexion = mysqli_connect("localhost", "root", "", "ropa");
            
            mysqli_select_db($Conexion, "ropa") or die ("No se puede seleccionar la BBDD.");
            
            $Size = "4";

            $Result = mysqli_query($Conexion, "Select * FROM camiseta WHERE talla=$Size");
            
            if (mysqli_connect_errno()) {
                printf("<p>Conexión fallida: </p>", mysqli_connect_error());
                exit();
            }

            $NumberRows = mysqli_num_rows($Result);
        ?>

        <h3>
            Camisetas &darr;
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
                    echo "<td colspan=5 align='center'>No se ha encontrado ningun registro (con la talla indicada)</td>"; 
                    echo "</tr>";
                }
            ?>

        </table>

    </body>
</html>