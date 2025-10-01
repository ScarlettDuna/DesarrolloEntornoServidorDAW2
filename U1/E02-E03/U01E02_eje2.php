<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $WeekMealplan = [
            "Monday" => "Soup", 
            "Tuesday" => "Lentils", 
            "Wednesday" => "Burger", 
            "Thursday" => "Fish and chips", 
            "Friday" => "Pizza", 
            "Saturday" => "Japanese Curry", 
            "Sunday" => "Roast"];

        echo "<table border=1>";
        foreach ($WeekMealplan as $key => $value) {
            echo ("<tr><td>$key</td>
                <td>$value</td></tr>");
        }
        echo "</table>";
        
    ?>
</body>
</html>