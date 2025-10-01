<?php
$integer = 10;
$decimal = 22.50;
$string = "I am learning PHP";
echo ("<table border='1' cellpadding='5'>
        <tr>
            <td>". gettype($integer) ."</td>
            <td>". $integer. "</td>
        </tr>
        <tr>
            <td>". gettype($decimal) ."</td>
            <td>". $decimal. "</td>
        </tr>
        <tr>
            <td>". gettype($string). "</td>
            <td>". $string. "</td>
        </tr>
    </table>");
?>
