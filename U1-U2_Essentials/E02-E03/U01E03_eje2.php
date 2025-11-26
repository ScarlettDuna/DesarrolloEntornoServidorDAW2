<?php
$WeekMealplan = [
        "Monday" => "Soup", 
        "Tuesday" => "Lentils", 
        "Wednesday" => "Burger", 
        "Thursday" => "Fish and chips", 
        "Friday" => "Pizza", 
        "Saturday" => "Japanese Curry", 
        "Sunday" => "Roast"];

$day = "Sunday";
// $WeekMealplan["Weekends"] = "Mojito";
// print_r($WeekMealplan);
echo "On $day we eat $WeekMealplan[$day]";