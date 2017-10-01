<?php

session_start();

if (isset($_POST['writeCsv'])) {
    $errors = [];
    if (!isset($_POST['firstName']) | empty($_POST['firstName'])) {
        $errors['firstName'] = '<div class="alert alert-danger">Имя не передано или пустое</div>';
        include "./ex2.html";
    } elseif (!isset($_POST['lastName']) | empty($_POST['lastName'])) {
        $errors['lastName'] = '<div class="alert alert-danger">Фамилия не передана или пустая</div>';
        include "./ex2.html";
    } elseif (!isset($_POST['position']) | empty($_POST['position'])) {
        $errors['position'] = '<div class="alert alert-danger">Должность не передана или пустая</div>';
        include "./ex2.html";
    } else {
        $file = fopen('hw5.csv', 'a+');
        fputcsv($file, $_POST);
        fclose($file);
        header("Location: ./ex2.html");
    }
} elseif (isset($_POST['readCsv'])){
    include "readCsv.php";
}