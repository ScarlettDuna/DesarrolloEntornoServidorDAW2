<?php
// l.	Create a program that asks us for a number n, and tells us how many numbers there are between 1 and n that are prime numbers.
function is_prime(int $n): bool {
    if ($n <= 1) return false;
    if ($n <= 3) return true; // 2 y 3 son primos
    if ($n % 2 === 0 || $n % 3 === 0) return false;

    $limit = (int) sqrt($n);
    for ($i = 5; $i <= $limit; $i += 6) {
        if ($n % $i === 0 || $n % ($i + 2) === 0) {
            return false;
        }
    }
    return true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How many prime numbers are there?</title>
</head>
<body>
    <h1>How many prime numbers are there?</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        ?>
        <form action="" method="post">
            <h3>Enter a positive number</h3>
            <input type="number" name="prime" required>
            <button type="submit">Enter</button>
        </form>
        <?php
    } else {
        if (isset($_POST["prime"])) {
            $primes = [];
            $n = intval($_POST["prime"]);
            for ($i=2; $i <= $n; $i++) { 
                if (is_prime($i)) {
                    $primes[] = $i;
                }
            }
            echo "<h3>There are ". count($primes) . " prime numbers between 1 and $n </h3><br>";
            echo implode(", ", $primes);
        }
    }
    
    ?>
</body>
</html>