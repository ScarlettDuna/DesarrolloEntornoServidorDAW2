<!-- 
    Create an address book that saves complete contacts, i. e. first name, last name, ID number, phone number, and address. 
    The search key is the ID number.
    It should display a menu with different options until the user press "0" ans allow you to add, edit, view and delete contacts. 
    $addressBook = [
        ["idNumber" = 101, "firstName" => "Arantxa", "lastName" => "García", "phone" => "123456789", "address" => "Calle Falsa 123"],
        ["idNumber" = 102, "firstName" => "Juan", "lastName" => "Pérez", "phone" => "987654321", "address" => "Avenida Siempre Viva 742"]
    ];
-->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Book</title>
</head>
<body>
    <h1>Address Book</h1>
    <form action="" method="post">
        <fieldset>
        <?php
        if (!($_SESSION["REQUEST_METHOD"] === "POST")) {

        
        ?>
            <label for="action">What do you want to do?</label>
            <input type="radio" name="action" id="action" value="add">Add
            <input type="radio" name="action" id="action" value="edit">Edit
            <input type="radio" name="action" id="action" value="view">View
            <input type="radio" name="action" id="action" value="delete">Delete
        </fieldset>
        <button type="submit">Send</button>
        <?php
        } else if ($_POST["action"] === "add") {
        ?>
        <label for="firstName">First name</label>
        <input type="text" name="firstName" id="firstName">
        <br>
        <label for="lastName">Last name</label>
        <input type="text" name="lastName" id="lastName">
        <br>
        <label for="phone">Phone number</label>
        <input type="number" name="phone" id="phone">
        <br>
        <label for="address">Address</label>
        <input type="text" name="address" id="address">
        <br>
        <button type="submit">Add contact</button>
        <?php 
        } else if ($_POST["action"] === "edit") {}
        ?>

    </form>
</body>
</html>