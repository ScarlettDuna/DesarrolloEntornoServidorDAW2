<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_COOKIE['user'])){
    $cookieName = "user";
    $cookieValue = $_POST['user'];
    $cookiePass = "password";
    $cookiePassValue = $_POST['pass'];
    setcookie($cookieName, $cookieValue, time() + 60*15);
    setcookie($cookiePass, $cookiePassValue, time() + 60*15);
    header("Location: ./ejercicio1.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test cookies</title>
</head>
<body>
    <?php
    if (!isset($_COOKIE['user'])){
        echo ("<form method='post'>
                    <label for='user'>User</label>
                    <input type='text' name='user' id='user'><br>
                    <label for='pass'>Password</label>
                    <input type='password' name='pass' id='pass'>
                    <button type='submit'>Send</button>
                </form>");
    } else {
        echo "<h1>Welcome ".$_COOKIE['user']."</h1>";
    } 
    ?>

</body>
</html>