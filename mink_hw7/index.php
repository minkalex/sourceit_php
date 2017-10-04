<?php

session_start();

require_once "./functions.php";

logOut();
$errors = [];
$userNotRegistered = true;
if (isset($_POST['submitLogin'])) {
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';
    if (strlen($login) > 16 | strlen($login) < 5) {
        $errors['login'] = '<div class="alert alert-dark">Логин должен быть от 5 до 16 символов</div>';
    }
    if (strlen($password) > 12 | strlen($password) < 6) {
        $errors['password'] = '<div class="alert alert-dark">Пароль должен быть от 6 до 12 символов</div>';
    }
    if (empty($errors) && $userNotRegistered) {
        $file = fopen('./users.csv', 'r');
        if ($file !== FALSE) {
            $data = [];
            $result = [];
            while ($data !== FALSE) {
                $data = fgetcsv($file);
                array_push($result, $data);
            }
            for ($i = 0; $i < count($result); $i++) {
                if ($result[$i][1] === $login) {
                    if (password_verify($password, $result[$i][2])) {
                        $userNotRegistered = false;
                        $_SESSION['login'] = $login;
                        include './profile.html';
                        break;
                    }
                }
            }
            fclose($file);
        }
    }
    if ($userNotRegistered) {
        $message = '<div class="alert alert-dark">Вы не зарегистированы либо неверно ввели логин и/или пароль</div>';
    }
    if (!empty($errors) | !empty($message)) {
        include "./login.html";
    }
}

if (isset($_POST['goToRegistration'])) {
    include "./registration.html";
}

if (isset($_POST['logOut'])) {
    include "./login.html";
}