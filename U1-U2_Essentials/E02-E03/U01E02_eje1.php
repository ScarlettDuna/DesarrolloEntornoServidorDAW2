<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3></h3>
    <?php
    // "triangle? sin tabla"
    $number = 7;
    for ($i=1; $i < $number; $i++) { 
        echo (str_repeat("*", $i)."</br>");
    }

    // con tabla
    $number = 7;
    echo "<table border='1'>";
    for ($i=1; $i < $number; $i++) { 
        echo "<tr>";
        echo str_repeat("<td>*</td>", $i);
        echo "</tr>";
    }
    echo "</table>";

    // piramid
    $number2 = 10;
    for ($i=0; $i < $number2; $i++) { 
        $spaces = intval(($number2 - $i) / 2);
        echo (str_repeat("-", $spaces). str_repeat("*", $i)."</br>");    // &nbsp spacion de no separación
    }

    // inverted
    $number3 = 10;
    for ($i=$number3; $i > 0; $i--) { 
        $spaces = intval(($number3 - $i) / 2);
        echo (str_repeat("-", $spaces). str_repeat("*", $i)."</br>");   
    }

    ?>
</body>
</html>