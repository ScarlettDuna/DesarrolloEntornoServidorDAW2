<?php
// fopen() function
$fich = fopen("fichero_ejemplo.txt", "r");
if ($fich === FALSE) {
    echo "No se encuentra fichero_ejemplo.txt";
} else {
    echo "fichero_ejemplo.txt se abrió con éxito";
    fclose($fich);
}
$fich = fopen("fichero_no_existe.txt", "r");
if ($fich === FALSE) {
    echo "No se encuentra fichero_no_existe.txt";
} else {
    echo "fichero_no_existe.txt se abrió con éxito";
    fclose($fich);
}

// feof() - returns TRUE if the end of the file has been reached
$fich = fopen("fichero_ejemplo.txt", "r");
if ($fich === FALSE) {
    echo "No se encuentra el fichero o no se pudo leer. <br>";
} else {
    while (!feof($fich)) {
        $car = fgets($fich);
        echo $car;
    }
    fclose($fich);
}

// fscanf() - read a line and apply a format to it. The file and the format can be passed to it as variables
// $valores = fscanf($fichero, $formato, $var1...)
$fich = fopen("matriz.txt", "r");
if ($fich === FALSE) {
    echo "No se encuentra el fichero o no se pudo leer. <br>";
} else {
    // Primera manera
    while (!feof($fich)) {
        $num = fscanf($fich, "%d %d %d %d");
        echo "$num[0] $num[1] $num[2] $num[3]<br>";
    }
    rewind($fich);
    // segunda manera
    while (!feof($fich)) {
        $num = fscanf($fich, "%d %d %d %d", $num1, $num2, $num3, $num4);
        echo "$num1 $num2 $num3 $num4<br>";
    }
    fclose($fich);
}
// file_get_contents() & file_put_contents()
$contenido = file_get_contents("fichero_ejemplo.txt");
echo "contenido de fichero: $contenido <br>";
$res = file_put_contents("fichero_salida.txt", "Fichero creado con file_put_contents");
if ($res) {
    echo "Fichero creado con éxito";
} else {
    echo "Error al crear fichero";
}
