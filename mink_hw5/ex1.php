<?php

echo "<h1 align='center'>Задача 1</h1>";

function numberToBool ($arg): bool {
    if (gettype($arg) == 'integer' | gettype($arg) == 'double') {
        echo "Аргумент - $arg, результат - ".(boolean)$arg;
        return (boolean)$arg;
    } else {
        echo "Аргумент функции должен быть числом!";
        return false;
    }
}

numberToBool('sdfsf');