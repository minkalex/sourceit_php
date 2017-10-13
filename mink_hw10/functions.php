<?php

function getLinesFromTxt($file) {
    $f = fopen($file, 'r');
    while ($line = fgets($f)) {
        yield $line;
    }
    fclose($f);
}

function printLinesFromTxt ($file) {
    foreach (getLinesFromTxt($file) as $n => $line) {
        echo "<p>" . $line . "</p>";
    }
}

printLinesFromTxt("./fishText.txt");
include "ex1.html";