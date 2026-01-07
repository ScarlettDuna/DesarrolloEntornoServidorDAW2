<?php
require __DIR__ . '/../vendor/autoload.php';
try {
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $db = $client->clothes;
    // SELECT * FROM people;
    $people = $db->people;
    $stockPeople = $people->find();
    // SELECT * FROM pants;
    $pants = $db->pants;
    $stockPants = $pants->find();
    // SELECT * FROM footwear;
    $footwear = $db->footwear;
    $stockFootwear = $footwear->find();
    // SELECT * FROM tshirts;
    $tshirts = $db->tshirts;
    $stockTshirts = $tshirts->find();
} catch (Exception $e) {
    echo $e->getMessage();
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['person_id'])) {
    $person_id = $_POST['person_id'];
    $pants_id = $_POST['pants_id'];
    $tshirt_id = $_POST['tshirt_id'];
    $footwear_id = $_POST['footwear_id'];
    $date = date('Y-m-d');
    try {
        $client = new MongoDB\Client("mongodb://localhost:27017");
        $db = $client->clothes;
        $outfit = $db->outfit;
        // Insert
        $outfit->insertOne([
            'person_id' => $person_id,
            'pants_id' => $pants_id,
            'tshirt_id' => $tshirt_id,
            'footwear_id' => $footwear_id,
            'date' => $date,
        ]);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    header('Location: mongo_regOutfit.php');
    exit;
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
    <title>Register Outfit</title>
</head>
<body>
<h1>Register outfit</h1>
<form method="post">
    <label for="person_id">Person ID</label>
    <select name="person_id" id="person_id" required>
        <?php foreach ($stockPeople as $person) : ?>
            <option value="<?php echo $person['id']; ?>"><?php echo $person['name']; ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <label for="pants_id">Pants ID</label>
    <select name="pants_id" id="pants_id" required>
        <?php foreach ($stockPants as $pant) : ?>
            <option value="<?php echo $pant['id']; ?>"><?php echo $pant['brand'].' | '.$pant['color'].' | '.$pant['size']; ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <label for="tshirt_id">T-shirt ID</label>
    <select name="tshirt_id" id="tshirt_id" required>
        <?php foreach ($stockTshirts as $tshirt) : ?>
            <option value="<?php echo $tshirt['id']; ?>"><?php echo $tshirt['brand'].' | '.$tshirt['color'].' | '.$tshirt['size']; ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <label for="footwear_id">Footwear ID</label>
    <select name="footwear_id" id="footwear_id" required>
        <?php foreach ($stockFootwear as $footitem) : ?>
            <option value="<?php echo $footitem['id']; ?>"><?php echo $footitem['brand'].' | '.$footitem['color'].' | '.$footitem['size']; ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <button type="submit">Register</button>
</form>
<a href="./mongo_menu.php">Go back to Menu</a>
</body>
</html>
