<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['actionDB'])) {
    switch ($_POST['actionDB']) {
        case 'addBook':
            header('location: add_libro.php');
            exit;
        case 'returnBook':
            header('location: devolver_libro.php');
            exit;
        case 'deleteBook':
            header('location: eliminar_libro.php');
            exit;
        case 'lendBook':
            header('location: prestar_libro.php');
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
    <link rel="stylesheet" href="style.css">
    <title>Update Library</title>
</head>
<body>
<h1>Update Library</h1>
<p>Select the action you want to take</p>
<form method="post">
    <select name="actionDB" id="actionDB">
        <option value="addBook">Add book</option>
        <option value="returnBook">Return book</option>
        <option value="deleteBook">Delete book</option>
        <option value="lendBook">Lend book</option>
    </select>
    <button type="submit">Continue</button>
</form>
</body>
</html>
