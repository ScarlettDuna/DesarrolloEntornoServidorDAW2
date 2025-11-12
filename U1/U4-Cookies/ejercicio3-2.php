<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['user'] = $_POST['user'];
    header("Location: ejercicio3-3.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 3 - Log in</title>
</head>
<body>
    <h2>Lon in your account</h2>
    <form method="post">
        <label for="user">User</label>
        <input type="text" name="user" id="user"><br>
        <label for="pass">Password</label>
        <input type="password" name="pass" id="pass"><br>
        <button type="submit">Log in</button>
    </form>

</body>
</html>
