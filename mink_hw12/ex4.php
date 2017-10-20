<?php

$db = [
    "name" => "test",
    "host" => "localhost",
    "port" => "3306",
    "user" => "root",
    "pwd" => "",
];

$dsn = "mysql:dbname=" . $db["name"] . ";host=" . $db["host"] . ";port=" . $db["port"];
$pdo = new PDO($dsn, $db["user"],$db["pwd"]);
$sth = $pdo->prepare("SELECT count(*) FROM `object`");
$sth->execute();
$data = $sth->fetchAll(PDO::FETCH_ASSOC);
var_dump($data);