<?php
$fecha = $_GET["fecha"];
$cod = $_GET["cod"];
$tlfn = $_GET["tlfn"];

$codigo_postal = str_split($cod,2);
$num_tel = str_split($tlfn,1);


if($codigo_postal [0] == 28 ){
    echo "Eres de Madrid\n";
}else{
    echo "No eres de Madrid\n";
}

if($num_tel [0] == 6){
    echo "Es un teléfono móvil";
}else if($num_tel [0] == 9 && $num_tel [1] == 1){
    echo "Teléfono fijo";
}else{
    echo "Otro teléfono";
}

