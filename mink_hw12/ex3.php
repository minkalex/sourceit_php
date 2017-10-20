<?php

class SomeClass {
    public function __construct($color = "green")
    {
        //var_dump($color);
    }
    public $someVar = null;

    static public function getNew()
    {
        return new static();
    }
}

$newSomeClass = new SomeClass();

class AnotherClass extends SomeClass
{

}

$newAnotherClass = new AnotherClass();

if (get_parent_class($newAnotherClass) == false) {
    $parent = NULL;
} else {
    $parent = get_parent_class($newAnotherClass);
}

$db = [
    "name" => "test",
    "host" => "localhost",
    "port" => "3306",
    "user" => "root",
    "pwd" => "",
];

$dsn = "mysql:dbname=" . $db["name"] . ";host=" . $db["host"] . ";port=" . $db["port"];
$pdo = new PDO($dsn, $db["user"],$db["pwd"]);

$sth = $pdo->prepare("INSERT INTO `object`(`id`, `obj_name`, `obj_parent`, `obj_serialized`) VALUES (NULL,:obj_name,:obj_parent,:obj_serialized)");
$sth->execute(["obj_name" => get_class($newAnotherClass), "obj_parent" => $parent, "obj_serialized" => serialize($newAnotherClass)]);

$sth2 = $pdo->prepare("SELECT `obj_serialized` FROM `object`");
$sth2->execute();
$data = $sth2->fetchAll(PDO::FETCH_ASSOC);
for ($i = 0; $i < count($data); $i++) {
    $no = $i + 1;
    echo "Объект №" . $no . " - ";
    var_dump(unserialize($data[$i]["obj_serialized"]));
    echo "<br>";
}