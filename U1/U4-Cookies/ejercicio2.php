<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $user = $_POST['user'];
    $cookieTime = date("d/m/Y H:i:s");
    // Updates login time
    setcookie($user, $cookieTime, time() + 60*60*24);
    // updates "last user"
    setcookie('lastUser', $user, time() + 60);
    header("Location: ./ejercicio2.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 2 - cookies</title>
</head>
<body>
    <?php 
    if (!isset($_COOKIE["lastUser"])) {
        echo '<form method="post">
                <label for="user">User</label>
                <input type="text" name="user"><br>
                <label for="pass">Password</label>
                <input type="password" name="pass"><br>
                <button type="submit">Send</button>
            </form>';
    } else {
        echo "<h1>Welcome ".($_COOKIE["lastUser"])."</h1>";
        echo "<p>Last time you loged in was: ".($_COOKIE[$_COOKIE["lastUser"]])." </p>";
    }
    ?>
    
</body>
</html>