<?php

echo "<h1 align='center'>1</h1>";
$sum = 0;
for ($i = 1; $i < 113; $i += 3) {
    $sum += $i;
}
echo "Сумма равна - <strong>$sum</strong>.";

//-----------------------------------------------------------------------

echo "<h1 align='center'>2</h1>";
$lenght = rand(2, 15);
for ($i = 0; $i < $lenght; $i++) {
    if ($i % 2 == 0) {
        $array[$i] = 0;
    } else {
        $array[$i] = 1;
    }
}
print_r($array);

//-----------------------------------------------------------------------

echo "<h1 align='center'>3</h1>";
$lenght2 = rand(2, 15);
for ($i = 0; $i < $lenght2; $i++) {
    $array2[$i] = pow($i, 2);
}
print_r($array2);

//-----------------------------------------------------------------------

echo "<h1 align='center'>4</h1>";
$lenght3 = rand(2, 10);
for ($i = 0; $i < $lenght3; $i++) {
    $element = rand(1, 10);
    $array3[$i] = $element;
}
print_r($array3);
echo "<h3 align='center'>Стандартными функциями</h3>";
echo "Сумма - <strong>" . array_sum($array3) . "</strong><br>";
echo "Произведение - <strong>" . array_product($array3) . "</strong><br>";
echo "<h3 align='center'>Нестандартными функциями</h3>";
$product = 1;
foreach ($array3 as $value){
    $sum2 += $value;
    $product *= $value;
}
echo "Сумма - <strong>" . $sum2 . "</strong><br>";
echo "Произведение - <strong>" . $product . "</strong><br>";

//-----------------------------------------------------------------------

echo "<h1 align='center'>5</h1>";
$lenght4 = rand(2, 10);
for ($i = 0; $i < $lenght4; $i++) {
    $element2 = rand(1, 10);
    $array4[$i] = $element2;
}
echo "До<br>";
print_r($array4);
echo "<br>";
for ($i = 0; $i < $lenght4 - 1; $i++){
    for ($j = 1 + $i; $j < $lenght4; $j++){
        if ($array4[$i] == $array4[$j]) {
            unset($array4[$j]);
        }
    }
}
echo "После<br>";
print_r($array4);

//-----------------------------------------------------------------------

echo "<h1 align='center'>6</h1>";
$lenght5 = rand(2, 10);
for ($i = 0; $i < $lenght5; $i++) {
    $element3 = rand(-10, 10);
    $array5[$i] = $element3;
}
echo "До<br>";
print_r($array5);
echo "<br>";
for ($i = 0; $i < $lenght5 * 2; $i++){
    if ($array5[$i] < 0) {
        array_splice($array5, $i + 1, 0, 0);
    }
}
echo "После<br>";
print_r($array5);

//-----------------------------------------------------------------------

echo "<h1 align='center'>7</h1>";
$bmw = [
    "model" => "X5",
    "speed" => "120",
    "doors" => "5",
    "years" => "2006"
];
echo "bmw";
foreach ($bmw as $value) {
    echo " - " .$value;
}
echo "<br>";
$toyota = [
    "model" => "Carina",
    "speed" => "130",
    "doors" => "4",
    "years" => "2007"
];
echo "toyota";
foreach ($toyota as $value) {
    echo " - " .$value;
}
echo "<br>";
$opel = [
    "model" => "Corsa",
    "speed" => "140",
    "doors" => "5",
    "years" => "2007"
];
echo "opel";
foreach ($opel as $value) {
    echo " - " .$value;
}

//-----------------------------------------------------------------------

echo "<h1 align='center'>8</h1>";
$cars = [
    "bmw" => [
        "model" => "X5",
        "speed" => "120",
        "doors" => "5",
        "years" => "2006"
    ],
    "toyota" => [
        "model" => "Carina",
        "speed" => "130",
        "doors" => "4",
        "years" => "2007"
    ],
    "opel" => [
        "model" => "Corsa",
        "speed" => "140",
        "doors" => "5",
        "years" => "2007"
    ]
];
foreach ($cars as $key => $car) {
    echo "$key";
    foreach ($car as $value){
        echo " - " .$value;
    }
    echo "<br>";
}