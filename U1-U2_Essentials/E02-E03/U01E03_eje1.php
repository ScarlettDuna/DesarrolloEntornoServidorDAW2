<?php
$geometricFigure = "square";
if ($geometricFigure == "square") {
    echo "To find de perimeter of a square you must know the length of one of its sisde and multiply by 4.";
} elseif ($geometricFigure == "rectangle") {
    echo "To find de perimeter of a rectangle you must know the length and width and multiply them.";
} elseif ($geometricFigure == "triangle") {
    echo "To find de perimeter of triangle you must know the base and high, multiply them and then divide by 2.";
} else {
    echo "Shape not supported, try square, rectangle or triangle.";
}


$num1 = 4;
$num2 = 10.5;
$operacion = 3;

switch ($operacion) {
    case "addition":
    case "+":
        echo "Addition: ". ($num1 + $num2);
        break;
    case "substraction":
    case "-":
        echo "Substraction: " . ($num1 - $num2);;
        break;
    case "multiplication":
    case "*":
        echo "Multiplication: ". ($num1 * $num2);
        break;
    case "division":
    case "/":
        echo "Division: ". ($num1 / $num2);
        break;
    default:
        echo "Operation not supported. Try addition, substraction, multiplication or division";
}

