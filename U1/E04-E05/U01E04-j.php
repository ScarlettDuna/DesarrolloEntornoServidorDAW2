<?php
// j.	Design an application that shows the multiplication tables from 1 to 10.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication tables 1 to 10</title>
    <style>
        h1 {
            text-align: center;
        }
        table {
            margin: 10px;
            display: inline-flex;
        }
        td {
            padding: 5px;
            min-width: 25px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Multiplication tables 1 to 10</h1>
    
        <?php
        for ($i = 1; $i <= 10; $i ++){
            echo "<table border=1>";
            echo "<tr><td colspan=\"3\">Table of $i</td></th>";
            for ($j=1; $j <= 10 ; $j++) { 
                echo ("<tr>
                        <td>$i</td>
                        <td>$j</td>
                        <td>".($i*$j)."</td>
                    </tr>");
            }
            echo "</table>";
        }
        ?>
        
</body>
</html>