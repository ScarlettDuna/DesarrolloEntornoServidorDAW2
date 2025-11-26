<?php
function searchMinimumValue($array){
    $min = $array[0];
    for ($i=0; $i < count($array); $i++) { 
        if ($array[$i] < $min) {
            $min = $array[$i];
        }
    }
    return $min;
}
function searchMaxValue($array){
    $max = $array[0];
    for ($i=0; $i < count($array); $i++) { 
        if ($array[$i] > $max) {
            $max = $array[$i];
        }
    }
    return $max;
}
function mediaArray($array){
    $total = 0;
    for ($i=0; $i < count($array); $i++) { 
        $total += $array[$i]; 
    }
    return $total / count($array);
}
function isInArray($array, $value){
    $position = -1;
    for ($i=0; $i < count($array); $i++) { 
        if ($array[$i] === $value){
            return $i;
        }
    }
    return $position;
}

function searchFilaArrayBi($array, $x){
    if (isset($array[$x])) {
        return $array[$x];
    }
    return null; 
}

function searchColumnaArrayBi($array, $y) {
    $col = [];
    foreach ($array as $fila) {
        if (isset($fila[$y])) {
            $col[] = $fila[$y];
        }
    }
    return $col;
}

function positionArrayBi($array, $value) {
    for ($i=0; $i < count($array); $i++) { 
        for ($j=0; $j < count($array[$i]); $j++) { 
            if ($array[$i][$j] === $value){
                return [$i, $j];
            }
        }
    }
    return [-1, -1];
}