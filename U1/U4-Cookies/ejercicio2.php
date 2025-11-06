<?php
// A form to enter de user data (name and password)
// All the users are valid users. (You should keep a new cookie with the access time for each user if the cookie doesn't exits)
// Each tiem a user logs in, their login time is recorded.
// if they have already logged in (a cookies exists), their last login is displayed and updated to reflext their recent login. 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_COOKIE[$_POST['user']])){
    $lastUser = $_POST['user'];
    $cookieName = $_POST['user'];
    $cookieTime = date("d/m/Y H:i:s");
    setcookie('lastUser', $lastUser, time() + 60);
    setcookie($cookieName, $cookieTime, time() + 60*60*24);
    header("Location: ./ejercicio2.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 cookies</title>
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