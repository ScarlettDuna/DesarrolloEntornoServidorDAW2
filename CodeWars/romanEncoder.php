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
    $numbers = str_split(strrev((String)$number));
    if (count($numbers) > 4) {
        echo "Invalid input";
        return;
    }
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
                $romano = $romano . str_repeat($one, $digit);
                break;
            case 4:
                $romano = $romano . $one . $five;
                break;
            case 5:
                $romano = $romano . $five;
                break;
            case 6:
            case 7:
            case 8:
                $romano = $romano . $five . str_repeat($one, $digit - 5);
                break;
            case 9:
                $romano = $romano . $one. $ten ;
                break;
        }
    }
    
    return $romano;
}
$number = 78;
echo solution($number);