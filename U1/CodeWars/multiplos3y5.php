<?php
    
    function solution(int $number): int {
    $multiplos = [];
    for ($i = 3; $i < $number; $i++){
        if ($i % 3 === 0 || $i % 5 == 0){
        array_push($multiplos, $i);
        }
    }
    return array_sum($multiplos); 
}

echo solution(10);