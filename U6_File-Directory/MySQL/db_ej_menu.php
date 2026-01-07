<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['actionDB'])) {
    switch ($_POST['actionDB']) {
        case 'ModFootwear':
            header('location: db_ej_modFootwear.php');
            exit;
        case 'InPants':
            header('location: db_ej_inPants.php');
            exit;
        case 'Load':
            header('location: db_ej_load.php');
            exit;
        case 'RegOutfit':
            header('location: db_ej_regOutfit.php');
            exit;
        case 'DelFootwear':
            header('location: db_ej_delFootwear.php');
            exit;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update 'clothes' DataBase</title>
</head>
<body>
<h1>Update 'clothes' DataBase</h1>
<p>Select the action you want to take</p>
<form method="post">
    <select name="actionDB" id="actionDB">
        <option value="ModFootwear">Modify footwear</option>
        <option value="InPants">Insert pants</option>
        <option value="Load">Load t-shirts</option>
        <option value="RegOutfit">Register outfit</option>
        <option value="DelFootwear">Delete footwear</option>
    </select>
    <button type="submit">Continue</button>
</form>
</body>
</html>
