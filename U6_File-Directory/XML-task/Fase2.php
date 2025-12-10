<?php
$xmlDoc = new DOMDocument();
$xmlDoc->load('biblioteca.xml');

// Script 1 - muestra una lista HTML con todos los libros
$libros = $xmlDoc->getElementsByTagName('libro');
foreach ($libros as $libro) {
    $titulo = $libro->getElementsByTagName('titulo')->item(0)->nodeValue;
    $autor = $libro->getElementsByTagName('autor')->item(0)->nodeValue;
    $isbn  = $libro->getElementsByTagName('isbn')->item(0)->nodeValue;
    $anio  = $libro->getElementsByTagName('anio_edicion')->item(0)->nodeValue;
    $editorial = $libro->getElementsByTagName('editorial')->item(0)->nodeValue;
    $estado = $libro->getElementsByTagName('estado')->item(0)->nodeValue;
    $fechaNode = $libro->getElementsByTagName('fecha_devolucion')->item(0);
    // Si existe fechaNode la devuelve, si no pone un '-'
    $fecha = $fechaNode ? $fechaNode->nodeValue : '—';
    echo "<p>$titulo - $autor - $estado</p>\n";
}

echo "\nLibros libres";
// Script 2: muestra solo libros libres.
foreach ($libros as $libro) {
    $titulo = $libro->getElementsByTagName('titulo')->item(0)->nodeValue;
    $autor = $libro->getElementsByTagName('autor')->item(0)->nodeValue;
    $editorial = $libro->getElementsByTagName('editorial')->item(0)->nodeValue;
    $estado = $libro->getElementsByTagName('estado')->item(0)->nodeValue;
    if ($estado == 'libre') {
        echo "<p>$titulo - $autor - $editorial</p>\n";
    }
}

echo "\nLibros prestados: fecha de devolución";
// Script 3: muestra solo libros prestados y su fecha_devolucion.
foreach ($libros as $libro) {
    $titulo = $libro->getElementsByTagName('titulo')->item(0)->nodeValue;
    $autor = $libro->getElementsByTagName('autor')->item(0)->nodeValue;
    $estado = $libro->getElementsByTagName('estado')->item(0)->nodeValue;
    $fechaNode = $libro->getElementsByTagName('fecha_devolucion')->item(0);
    // Si existe fechaNode la devuelve, si no pone un '-'
    $fecha = $fechaNode ? $fechaNode->nodeValue : '—';
    if ($estado == 'prestado') {
        echo "<p>$titulo - $autor - $fecha</p>\n";
    }
}