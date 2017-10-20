<?php

session_start();

class Login
{
    protected $login = '';
    public $errors = [];
    public static $counter = 0;

    public function __construct($login, $errors)
    {
        $this->login = $login;
        $this->errors = $errors;
        static::$counter++;

    }

    public function verifyLogin($login, $errors, $pattern): array
    {
            if (empty(preg_match($pattern, $login))) {
            } else {
                $errors['login'] = '<div class="alert alert-dark">Были введены символы в русской расскладке</div>';
            }
        include "./index.html";
        return $errors;
    }
    public static function objectCounter()
    {
        $count = '<br><div class="alert alert-dark container">Всего объектов - ' . static::$counter . '.</div>';
        echo $count;
    }
}

$login = $_POST['login'];
$errors = [];
$count = 0;
$pattern = '/(А|а|В|Е|е|К|к|М|Н|О|о|Р|р|С|с|Т|У|у|Х|х|ь)/';
$verifyLogin = new Login($login, $errors);
$verifyLogin->verifyLogin($login, $errors, $pattern);
$verifyLogin2 = new Login($login, $errors);
$verifyLogin3 = new Login($login, $errors);
$verifyLogin4 = new Login($login, $errors);
Login::objectCounter();