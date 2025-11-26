<?php
session_start();

if (!isset($_SESSION['jeans'])) $_SESSION['jeans'] = null;
if (!isset($_SESSION['shirt'])) $_SESSION['shirt'] = null;
if (!isset($_SESSION['jumper'])) $_SESSION['jumper'] = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['shirt'] = $_POST['shirt'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothes 4 Devs</title>
</head>
<body>
    <?php
    if ($_SESSION['jeans'] != null){
        echo "<p>You have selected the ". $_SESSION['jeans'] . " jeans</p>";
    } 
    if ($_SESSION['shirt'] != null) {
        echo "<p>You have selected the ". $_SESSION['shirt'] . " shirt</p>";
    } 
    if ($_SESSION['jumper'] != null) {
        echo "<p>You have selected the ". $_SESSION['jumper'] . " jumper</p>";
    }
    ?>
    <form action="E02-basic-resume4.php" method="post">
        <select name='jumper' >
            <option value='blue'>Blue</option>
            <option value='white'>White</option>
            <option value='red'>Red</option>
        </select>
        <button type="submit">Send</button>
    </form>
    <a href='E02-basic-shirts2.php'>Go to shirts</a><br>
    <a href='E02-basic-jeans1.php'>Go to jeans</a><br>
    <a href='E02-basic-resume4.php'>Go to resume</a><br>
</body>
</html>