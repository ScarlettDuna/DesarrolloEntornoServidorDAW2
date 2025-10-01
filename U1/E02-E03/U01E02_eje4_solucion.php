<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php
        if (isset($_POST["num"]) && isset($_POST["secretNumber"])) {
            echo $_POST["secretNumber"];
            if ($_POST["num"] === $_POST["secretNumber"]) {
                echo "You guessed it right!";
            } else {
                if ($_POST["num"] > $_POST["secretNumber"]) {
                    echo "Secret Number is smaller";
                } else {
                    echo "Secret Number is higher";
                }
            }
        
        ?>
        <form method="post">
            <label for="num">Enter a number between 0 and 10:</label>
            <input type="number" name="num" id="num">
            <button type="submit">Guess</button>
            <input type="hidden" name="secretNumber" value="<?=$_POST["secretNumber"]?>">
        </form>
        <?php
            } else {
                ?>
                <form method="post">
                <label for="num">Enter a number between 0 and 10:</label>
                <input type="number" name="num" id="num">
                <button type="submit">Guess</button>
                <input type="hidden" name="secretNumber" value="<?=rand(1,10)?>">
        </form>
        <?php } ?>
    </body>
    </html>
</body>
</html>