<?php

function csvToSql ($csv):bool {
    @$csvFile = fopen($csv, 'r');
    if ($csvFile !== FALSE) {
        $messages = [];
        $result = [];
        while ($messages !== FALSE) {
            $messages = fgetcsv($csvFile);
            $query = 'INSERT INTO `messages`(`message_id`, `created`, `username`, `message`) VALUES (NULL, "' . date ('Y-m-d H:i:s', $messages[0]) . '", "' . $messages[1] .'", "' . $messages[2] .'");' . PHP_EOL;
            @$sqlFile = fopen('./insert.sql', 'a+');
            fputs($sqlFile, $query);
            fclose($sqlFile);
        }
        fclose($csvFile);
        echo 'Файл записан';
        return true;
    } else {
        echo 'Файл не найден';
        return false;
    }
}

csvToSql("./messages.csv");