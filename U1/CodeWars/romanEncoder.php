<?php
/* 
"MM"      -> 2000
"MDCLXVI" -> 1666
"M"       -> 1000
"D"       ->  500
"CD"      ->  400
"C"       ->  100
"L"       ->   50
"X"       ->   10
"V"       ->    5
"I"       ->    1
*/
function solution($number){
    
    return "";
}
$number = 1666;
$numbers = str_split(strrev((String)$number));
print_r($numbers);
$romano = ""; // numbers = [1,6,6,6]
$symbols = [
    ['I', 'V', 'X'],  // unidades
    ['X', 'L', 'C'],  // decenas
    ['C', 'D', 'M'],  // centenas
    ['M']             // miles
];
for ($i = count($numbers) - 1; $i >= 0; $i--) {
    $digit = $numbers[$i];

    if ($i === 3) {
        // Miles → solo 'M'
        $romano .= str_repeat('M', $digit);
        continue;
    }

    [$one, $five, $ten] = $symbols[$i];

    switch ($digit) {
        case 1:
        case 2:
        case 3:
            $romano = str_repeat($one, $digit) . $romano;
            break;
        case 4:
            $romano = $one . $five . $romano;
            break;
        case 5:
            $romano = $five . $romano;
            break;
        case 6:
        case 7:
        case 8:
            $romano = $five . str_repeat($one, $digit - 5) . $romano;
            break;
        case 9:
            $romano = $one . $ten . $romano;
            break;
    }
}
echo $romano;