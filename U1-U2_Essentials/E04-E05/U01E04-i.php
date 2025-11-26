<?php 
// i.	Ask for a number (which must be between 0 and 10) and show the multiplication table for that number. 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Multiplication tables</h1>
    <form method="post">
        <label for="num">Enter number to know the multiplication table of that number!</label>
        <input type="number" name="num" id="num" min="1" max="13">
        <button type="submit">Generate</button>
    </form>
    <table border="1">
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST"  && $_POST["num"]) {
        for ($i=1; $i <= 10 ; $i++) { 
        echo ("<tr><td>".$_POST["num"]." x $i = ".($_POST["num"] * $i)."</td></tr>");
        }
    }
    
    ?>
    </table>
</body>
</html>