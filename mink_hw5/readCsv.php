<?php

function readCsv ($filename): array {
    @$file = fopen($filename, 'r');
    if ($file !== FALSE) {
        $data = [];
        $result = [];
        include "./ex2.html";
        while ($data !== FALSE) {
            $data = fgetcsv($file);
            array_push($result, $data);
        }
        fclose($file);
        return $result;
    } else {
        include "./ex2.html";
        echo '<div class="container alert alert-danger">Файл не найден!</div>';
        return [];
    }
}

function printCsv ($data) {
        for ($i = 0; $i < count($data) - 1; $i++) {
            echo "<div class='container'><ul class='list-group'>";
            for ($j = 0; $j < count($data[$i]) - 1; $j++) {
                if ($j % 3 == 0) {
                    echo "<li class='list-group-item list-group-item-dark'>" . $data[$i][$j];
                } elseif (($j % 3 > 0) & ($j % 3 <= 1)) {
                    echo " " . $data[$i][$j];
                } else {
                    echo " - " . $data[$i][$j] . "</li>";
                }
            }
            echo "</ul></div>";
        }
}

printCsv(readCsv("./hw5.csv"));