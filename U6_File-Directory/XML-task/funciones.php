<?php
$xmlDoc = new DOMDocument();
$xmlDoc->load('biblioteca.xml');

// Función prestarLibro
function prestarLibro($xmlDoc, $isbnBuscada, $fechaDevolucion) {
    $libros = $xmlDoc->getElementsByTagName('libro');
    // Busca por isbn
    foreach ($libros as $libro) {
        $isbn  = $libro->getElementsByTagName('isbn')->item(0)->nodeValue;
        $estado = $libro->getElementsByTagName('estado')->item(0)->nodeValue;
        $fechaNode = $libro->getElementsByTagName('fecha_devolucion')->item(0);
        if ($isbnBuscada == $isbn) {
            if ($estado == 'libre') {
                // Cambia estado a 'prestado'
                $libro->getElementsByTagName('estado')->item(0)->nodeValue = 'prestado';
                // Crea fecha de devolución
                if ($fechaNode) {
                    $fechaNode->nodeValue = $fechaDevolucion;
                } else {
                    $libro->appendChild($xmlDoc->createElement('fecha_devolucion', $fechaDevolucion));
                }
                $xmlDoc->save('biblioteca.xml');
                return;
            } elseif ($estado == 'prestado') {
                echo "<p>Este libro está prestado</p>";
                return;
            }
        }
    }
}

function devolverLibro($xmlDoc, $isbnBuscada) {
    $libros = $xmlDoc->getElementsByTagName('libro');
    // Busca por isbn
    foreach ($libros as $libro) {
        $isbn  = $libro->getElementsByTagName('isbn')->item(0)->nodeValue;
        $estado = $libro->getElementsByTagName('estado')->item(0);
        $fechaNode = $libro->getElementsByTagName('fecha_devolucion')->item(0);
        if ($isbnBuscada == $isbn) {
            if ($estado->nodeValue == 'prestado') {
                // Cambia estado a 'libre'
                $estado->nodeValue = 'libre';
                // Borrar fecha de devolución
                if ($fechaNode) {
                    $libro->removeChild($fechaNode);
                }
                $xmlDoc->save('biblioteca.xml');
                return;
            } elseif ($estado->nodeValue == 'libre') {
                echo "<p>Error: Este libro no aparece como prestado</p>";
                return;
            }
        }
    }
}
function addLibro($xmlDoc, $datosArray) {
    [$titulo, $autor, $isbnNew, $editorial, $anio_edicion] = $datosArray;
    $libros = $xmlDoc->getElementsByTagName('libro');
    foreach ($libros as $libro) {
        $isbn = $libro->getElementsByTagName('isbn')->item(0)->nodeValue;
        if ($isbn == $isbnNew) {
            echo "<p>Error: El ISBN " . $isbn . " ya existe</p>";
            return;
        }
    }
    $libro = $xmlDoc->createElement('libro');
    $libro->appendChild($xmlDoc->createElement("titulo", $titulo));
    $libro->appendChild($xmlDoc->createElement("isbn", $isbnNew));
    $libro->appendChild($xmlDoc->createElement("autor", $autor));
    $libro->appendChild($xmlDoc->createElement("editorial", $editorial));
    $libro->appendChild($xmlDoc->createElement("anio_edicion", $anio_edicion));
    $libro->appendChild($xmlDoc->createElement("estado", 'libre'));
    $xmlDoc->getElementsByTagName('genero')->item(0)->appendChild($libro);
    $xmlDoc->save('biblioteca.xml');
}


function removeLibro($xmlDoc, $isbnBuscada) {
    $libros = $xmlDoc->getElementsByTagName('libro');
    foreach ($libros as $libro) {
        $isbn = $libro->getElementsByTagName('isbn')->item(0)->nodeValue;
        if ($isbn == $isbnBuscada) {
            $libro->parentNode->removeChild($libro);
            $xmlDoc->save('biblioteca.xml');
            return;
        }
    }
}