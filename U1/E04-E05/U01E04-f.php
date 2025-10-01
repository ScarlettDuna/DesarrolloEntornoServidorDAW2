<?php
// f.	Prompt for numbers until a 0 is typed, display the sum of all numbers entered.
session_start(); // Iniciamos sesión

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
    <title>Add up the numbers</title>
</head>
<body>
    <h1>Add up the numbers</h1>
    <form method="post">
        <label for="num">Enter numbers to add them up to get the square!</label>
        <input type="number" name="num" id="num" >
        <p>To finish enter 0</p>
        <button type="submit">Add</button>
    </form>
    <table border="1">
    <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $num = (int)$_POST["num"];

            if ($num !== 0) {
                $_SESSION['numbers'][] = $num;
                $total = array_sum($_SESSION['numbers']);
                foreach ($_SESSION['numbers'] as $value){
                    echo ("<tr><td>".($value)."</td></tr>");
                }
                echo ("<tr><td>Total</td><td>".($total)."</td></tr>");
            
            } else {
                $total = array_sum($_SESSION['numbers']);
                echo ("<tr><td>Total</td><td>".($total)."</td></tr>");

                session_destroy(); // Destruye la sesión y sus datos
            }
        }
        
    
    ?>
    </table>
</body>
</html>