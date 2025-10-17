
<?php
// Create an address book that saves complete contacts, i. e. first name, last name, ID number, phone number, and address. 
// The search key is the ID number.
// It should display a menu with different options until the user press "0" ans allow you to add, edit, view and delete contacts. 
    
    $addressBook = [
            101 => ["firstName" => "Arantxa", "lastName" => "García", "phone" => "123456789", "address" => "Calle Falsa 123"],
            102 => ["firstName" => "Juan", "lastName" => "Pérez", "phone" => "987654321", "address" => "Avenida Siempre Viva 742"]
        ];
    $action = (int)readline("What do you want to do? <br>1 - Add a contact, <br>2 - See contact list <br>3 - Edit contact <br>4 - Delete contact. <br>5 - Exit.");
    while ($action < 0 || $action > 5) {
        echo "Write only numbers!";
        $action = (int)readline("<br>1 - Add a contact, <br>2 - See contact list <br>3 - Edit contact <br>4 . Delete contact.");
    }
    switch ($action) {
    case 1: // Add
        echo "To add a new contact add the following data";
        $firstName = readline("First Name: \n");
        $lastName = readline("Last Name: \n");
        $phone = readline("Phone number: \n");
        $address = readline("Address: ");
        $addressBook[(count($addressBook) + 100)] = Array("firstName" => $name, "lastName" => $lastName, "phone" => $phone, "address" => $address);
        break;
    case 2: // See
        for ($i=0; $i < count($addressBook); $i++) { 
            echo "ID: $addressBook[$i], Name: ".$addressBook[$i]["firstName"]." Last Name: ".$addressBook[$i]["lastName"]."";
        }
        echo "i equals 1";
        break;
    case 3: // Edit
        echo "i equals 2";
        break;
    case 4: // Delete
        echo "i equals 2";
        break;
    default:
}
?>