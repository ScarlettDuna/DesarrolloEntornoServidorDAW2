<?php 
// e.	Read a number and display its square, repeat the process until a number is entered negative.
session_start(); // inicia sesión

// Inicializamos el array si no existe
if (!isset($_SESSION['numbers'])) {
    $_SESSION['numbers'] = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duplicados</title>
</head>
<body>
    <h1>Show duplicates</h1>
    <form method="post">
        <label for="num">Enter number to get the square!</label>
        <input type="number" name="num" id="num" >
        <p>To finish enter a negative number</p>
        <button type="submit">Generate</button>
    </form>
    <table border="1">
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["num"] >= 0) {
        $_SESSION['numbers'][] = $_POST["num"];
        echo ("<tr><td>".($_POST["num"] ** 2)."</td></tr>");
        
    } elseif ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["num"] < 0) {
        $_SESSION['numbers'][] = $_POST["num"];
        print_r($_SESSION['numbers']);

        session_destroy(); // Destruye la sesión y sus datos
    }
    
    ?>
    </table>
</body>
</html>