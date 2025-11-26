<?php 
// k.	Draw a square of n elements on each side using *.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Draw a square</title>
</head>
<body>
    <h1>Draw a square</h1>
    <?php
    if (!($_SERVER["REQUEST_METHOD"] === "POST")){
        ?>
        <form action="" method="post">
            <p>How big should the square be? Insert a number between 3 and 20</p>
            <input type="number" name="square" min="3" max="20">
            <input type="submit" value="">Submit
        </form>
        <?php
    } else {
        $square_len = (int)$_POST["square"];
        echo str_repeat("*", $square_len)."<br>";
        for ($i=1; $i <= ($square_len - 2) ; $i++) { 
            echo "*". str_repeat("_", $square_len -2). "*<br>";
        }
        echo str_repeat("*", $square_len)."<br>";
    }

    ?>
</body>
</html>