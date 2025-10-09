<?php
// 1.	Split a text in chunks of 5 caracters and show it. (chunk_split)
$longString = "En un rincón del código, un desarrollador cansado decidió que ya era hora de dividir sus cadenas en fragmentos manejables, porque incluso las palabras más largas necesitan un respiro entre sus letras, y así nació la costumbre de trocear el texto como quien corta pan recién hecho, con precisión, cuidado y un leve toque de curiosidad.";
$stringChunks = chunk_split($longString, 5, "\n");
echo $stringChunks;

// 2.	You have a text. Delete al the whitespace trim(). Use count_chars and show the result. Then with the most used character, delete it from the original string. Show the result.
echo trim($longString, " ") . "\n";
$array_chars = count_chars($longString, 1);
print_r($array_chars) ;
//echo strlen($longString);
$max = max($array_chars);
echo "Lo más repetido es: ". $max. "\n";
// chr(int $codepoint): string
$asci = chr(32);
$removeMostRepeated = str_replace(" ", "", $longString);
echo $longString. "\n";

// 3.	Use explode() to cut a text of name of street to extract exclusively the names of the streets.
$streets = "Main Street, Oak Avenue, Pine Road, Maple Boulevard, Elm Street, Cedar Lane";
$streetArray = explode(", ", $streets);
print_r($streetArray);

// 4. Use the function similar_text() to calculate de similarity between two strings.
$bibliografia1 = "Cinco semanas en globo (1863); Viaje al centro de la Tierra (1864); De la Tierra a la Luna (1865); Los hijos del capitán Grant (1867); Veinte mil leguas de viaje submarino (1869-70); La isla misteriosa (1874); Miguel Strogoff (1876); La vuelta al mundo en ochenta días (1872); El faro del fin del mundo (1905)";

$bibliografia2 = "Cinq semaines en ballon (1863); Voyage au centre de la Terre (1864); De la Terre à la Lune (1865); Les Enfants du capitaine Grant (1867); Vingt mille lieues sous les mers (1869-70); L’île mystérieuse (1874); Michel Strogoff (1876); Le tour du monde en quatre-vingts jours (1872); Le Phare du bout du monde (1905)";
$similaridad = 0;
similar_text($bibliografia1, $bibliografia2, $similaridad);
echo "La similaridad entre ambos textos es: $similaridad \n";

printf("La similaridad entre ambos textos es: %.2f%%  \n", $similaridad);

// 5 •	Check if an specific word exists in a text. str_contains.
// str_contains(string $haystack, string $needle): bool
if (str_contains($bibliografia1, "globo")) {
    echo "The string contains globo! \n";
} else{
    echo "The string doesn't contain globo! \n";
}


// •  Check if an specific word exists in a text and the position. str_pos
if (strpos($bibliografia1, "Viaje")) {
    echo "The string contains 'Viaje' \n";
} else {
    echo "The string doens't contain 'Viaje' \n";
}

// •  Find the last occurrence of a word in a string. Strrchr
// strrchr(string $haystack, string $needle, bool $before_needle = false ): string|false

// •  Use strrev  ¿What happened?
?>