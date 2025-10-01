<?php
$number = 89;

$addition = 0;

for ($i=1; $i <= $number ; $i++) { 
    $addition += $i;

}

$average = $addition / $number;
echo "The average of the addition of the numbers from 1 to $number is $average";