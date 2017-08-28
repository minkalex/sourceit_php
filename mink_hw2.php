
<?php

echo "<h1 align='center'>Условия</h1>";
$age = rand(0, 150);
echo "Возраст - <strong>$age</strong>.<br>";
if ($age >= 18 && $age <= 59) {
    echo "<strong>Вам еще работать и работать.</strong>";
} else {
    if ($age > 59) {
        echo  "<strong>Вам пора на пенсию.</strong>";
    } else {
        if ($age >= 1 && $age <= 17) {
            echo "<strong>Вам еще рано работать.</strong>";
        } else {
            echo "<strong>Неизвестный возраст.</strong>";
        }
    }
}

echo "<h1 align='center'>Циклы</h1>";
$cols = rand(1, 10);
$rows = rand(1, 10);
echo "Строк - <strong>$rows</strong>, колонок - <strong>$cols</strong>.<br><br>";
echo "<table width='100%' border='1px'>";
for ($i = 1; $i <= $rows; $i++) {
    echo "<tr>";
    for ($j = 1; $j <= $cols; $j++) {
        if ($i == 1 || $j == 1) {
            echo "<td align='center' bgcolor='orange'><strong>" . $i * $j . "</strong></td>";
        } else {
            echo "<td>" . $i * $j . "</td>";
        }
    }
    echo "</tr>";
}
echo "</table><br>";

for ($i = 1; $i < 50; $i += 2) {
    echo "<strong>$i</strong><br>";
}

echo "<h1 align='center'>Попадание точки в область</h1>";
$x = rand(0, 10) / 10 + rand(-3, 1);
$y = rand(0, 10) / 10 + rand(-3, 1);
echo "<div align='center'><img src='HW.jpg' width='30%' alt='Область'></div><br>";
echo "Точка <strong>($x, $y)</strong>.<br>";
$newRadius = sqrt(pow($x, 2) + pow($y, 2));
//уравнение прямой у = - х - 2
if (($newRadius > 1) && !($x >= -2 && $y >= -2 && $y >= -$x - 2 && $x <= 0 && $y <= 0)) {
    echo "<strong> Точка не в области</strong>";
} else {
    echo "<strong>Точка в области</strong>";
}