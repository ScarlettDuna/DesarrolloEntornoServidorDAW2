<?php 
// g.	Ask for numbers until a negative one is entered, and calculate the average.
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Average of positive numbers</title>
</head>
<body>
    <h1>Add numbers to create the average</h1>
    <h3>To stop add a negative number</h3>
    <?php
    if (!($_SERVER["REQUEST_METHOD"] === "POST")) {
        ?> 
            <form action="" method="post">
            <label for="number">Insert a number</label>
            <input type="number" name="number" id="">
            <button type="submit">Add</button>
            </form>
        <?php
    } else{
        $number = (int)($_POST["number"]);
        if ($number > 0) {
            ?>
                <form action="" method="post">
                <label for="number">Insert another number</label>
                <input type="number" name="number" id="">
                <button type="submit">Add</button>
                </form>
            <?php

            $_SESSION['numbers'][] = $number;
            echo "Numbers added so far: \n";
            foreach ($_SESSION['numbers'] as $value){
                echo "$value - ";
            }
        } else {
            $total = array_sum($_SESSION['numbers']);
            $average = $total / count($_SESSION['numbers']);
            echo "<h4>The average of the numbers introduced is: $average </h4>";
            session_destroy(); // Destruye la sesión y sus datos

        }
    }
    ?>
</body>
</html>