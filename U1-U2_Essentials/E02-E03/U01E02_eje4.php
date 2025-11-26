<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $try = (int) $_POST["guess"];
    $randomNum = (int) $_POST["randomNum"];

    if ($try === $randomNum) {
        $message = "<h2>🎉 ¡That's right! The number is $randomNum</h2>";
    } elseif ($try < $randomNum) {
        $message = "<h2>The number is higher ⬆️</h2>";
    } else {
        $message = "<h2>The number is lower ⬇️</h2>";
    }
} else {
    // Primera carga → generar número aleatorio
    $randomNum = rand(1, 100);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Guess the number</title>
</head>
<body>
    <h1>Guess the number</h1>
    <form method="post">
        <p>Input a number between 1 and 100!</p>
        <input type="number" name="guess" min="1" max="100" required>
        <input type="hidden" name="randomNum" value="<?= $randomNum ?>">
        <button type="submit">Guess</button>
    </form>
    <?= $message ?>
</body>
</html>
