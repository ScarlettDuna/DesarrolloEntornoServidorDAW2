<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $nombre = $_POST["nombre"];
        $password = $_POST["pass"];

        if (($nombre == "Arantxa") && ($password == "123456")) {
            echo "Welcometo our site";
        } else {
            header("Location: index.html", true, 301);
        }
    ?>

</body>
</html>