<?php

echo "<h1 align='center'>Задача 1</h1>";
$name = 'Александр';
$age = 26;
echo "Меня зовут <strong>$name</strong>.";
echo "<br>","Мне <strong>$age</strong> лет.";

echo "<h1 align='center'>Задача 2</h1>";
$triangleSide = 5;
echo "Площадь равностороннего треугольника со стороной <strong>$triangleSide</strong> см равна 
<strong>" . pow($triangleSide, 2) * sqrt(3) / 4 . "</strong> см<sup>2</sup>.";

echo "<h1 align='center'>Задача 3</h1>";
$x = 0;
$a = 1;
$b = 2;
$c = 0;
if ($a < $c && $c <> 0) {
    $x = $a + $b / $c * $a;
    echo "X = <strong>$x</strong>, т.к. a < c (a = $a, c = $c).";
} else {
    if ($a == $c) {
        echo "X = <strong>100</strong>, т.к. a = c (a = $a, c = $c).";
    }
    if ($a > $c && $c > 0) {
        $x = $c * 3 * $b + $c / $c * sqrt($c);
        echo "X = <strong>$x</strong>, т.к. <strong>a > c</strong> (a = $a, c = $c).";
    } else {
        echo "<h2>Некорректное значение переменной с (с = $c).";
    }
}