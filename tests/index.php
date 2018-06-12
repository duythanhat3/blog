<?php

const PI = 3.14;

$myName = 'Vu Thanh';
$myName = 'Duy Thanh';
$myAge = 20;
$myMine = true;

$myHeight = 1.66;
$myRelax = ['relax1' => 'football', 'relax2' => 'run', 'relax3' => 'game'];

$result = strrev($myName);

foreach ($myRelax as $key => $value){
    echo $key . ' has value = ' . $value . '<br />';
}

echo PI;


/**
 * Lay thong tin ca nhan cua toi
 * 
 * string $name: Ten
 * int $age: Tuoi
 * array $relax: So thich
 * return string
 */
function getMyProfile($name, $age, $relax){
    $description = 'My name is ' . $name;
    $description .= ' ' . $age . ' year old';

    $description .= '. I like ';
    foreach ($relax as $value){
        $description .= $value . ', ';
    }
    $description = substr($description, 0, -2);

    return $description;
}

echo getMyProfile($myName, $myAge, $myRelax);
