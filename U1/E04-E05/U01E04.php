<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // Generate an array with 50 numbers
    $randomNumbers = [];
    for ($i = 0; $i < 50; $i++) {
        $randomNumbers[] = rand(-100, 100);
    }

    // a.	Calculate the arithmetic average of an array of numbers.
    $numbers = [1, 3, 5, 6, 7, 8];
    $addition = 0;
    foreach ($numbers as $num) {
        $addition += $num;
    }
    $average = $addition / count($numbers);
    echo $average;

    // b.	Calculate the arithmetic average of an array of numbers excluding the odd numbers.
    $numbers = [1, 3, 5, 6, 7, 8];
    $addition = 0;
    foreach ($numbers as $num) {
        if ($num % 2 !== 0) {
            $addition += $num;
        }
    }
    $average = $addition / count($numbers);
    echo $average;

    // c.	Calculate the arithmetic average of an array of numbers excluding the numbers that are in an odd position in the array.
    $numbers = [1, 3, 5, 6, 7, 8];
    $addition = 0;
    $indexes  = 0;
    for ($i = 1; $i < count($numbers); $i =+ 2 ) {
        $addition += $numbers[$i];
        $indexes += 1; 
    }
    $average = $addition / $indexes;

    // d.	Declare a variable with a number between 1 and 10,000 and say how many digits it has.
    $randomNumber = rand(1, 10000);
    $digits = 1;
    $calc = $randomNumber;
    while ($calc >= 10) {
        $digits += 1;
        $calc /= 10;
    }

    echo "$randomNumber has $digits digits";

    // e.	Read a number and display its square, repeat the process until a number is entered negative.

    $number2square = readline();
    while ($number2square > 0) {
        echo "The square of $number2square is ". ($number2square ** 2);
        $number2square = readline();
    }

    // f.	Prompt for numbers until a 0 is typed, display the sum of all numbers entered.
    $getAddedNums = readline();
    $addedNums = 0;
    while ($getAddedNums !== 0) {
        $addedNums += $getAddedNums;
        $getAddedNums = readline();
    }
    echo "The addition of all the numbers introduced is $addedNums";

    // g.	Ask for numbers until a negative one is entered, and calculate the average.

    // h.	With an array of numbers. Show the average of the positive numbers, the average of the negative numbers and the number of zeros.
    print_r($randomNumbers);
    for ($i=0; $i < count($randomNumbers); $i++) {
        $zeros = 0; 
        $evens = 0;
        $totalEvens = 0;
        $odds = 0;
        $totalOdds =0;
        if ($randomNumbers[$i] == 0) {
            $zeros += 1;
        } elseif ($randomNumbers[$i] % 2 === 0 ) {
            $totalEvens += $randomNumbers[$i];
            $evens +=1;
        } else {
            $totalOdds = $randomNumbers[$i];
            $odds += 1;
        }
    }
    echo "The average of the even numbers is ". ($totalEvens / ($evens === 0 ? 1 : $evens)). ".<br>";
    echo "The average of the odds numbers is ". ($totalOdds / ($odds === 0 ? 1 : $odds)). ".<br>";
    echo "There are $zeros zeros in the array.";
    

    // i.	Ask for a number (which must be between 0 and 10) and show the multiplication table for that number.

    // j.	Design an application that shows the multiplication tables from 1 to 10.

    // k.	Draw a square of n elements on each side using *.

    // m. Create an address book that saves complete contacts, i. e. first name, last name, phone number, and address. It should display a menu with different options until the user press "0" ans allow you to add, edit, view and delete contacts. 
    ?>
</body>
</html>