<?php

session_start();

require_once "./functions.php";

if (!isUserLoggedIn()) {
    //показать форму входа
    $errors = [];
    if (isset($_POST['registration'])) {
        $login = $_POST['login'] ?? '';
        $password = $_POST['password'] ?? '';
        $password2 = $_POST['password2'] ?? '';
        if (strlen($login) > 16 | strlen($login) < 5) {
            $errors['login'] = '<div class="alert alert-dark">Логин должен быть от 5 до 16 символов</div>';
        }
        if (strlen($password) > 12 | strlen($password) < 6) {
            $errors['password'] = '<div class="alert alert-dark">Пароль должен быть от 6 до 12 символов</div>';
        }
        if (strlen($password2) > 12 | strlen($password2) < 6) {
            $errors['password2'] = '<div class="alert alert-dark">Повторный пароль должен быть от 6 до 12 символов</div>';
        }
        if (!empty($errors)) {
            include "./registration.html";
        } elseif ($password == $password2 & recaptcha()) {
            $userId = microtime(true);
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $user = [$userId, $login, $passwordHash];
            $file = fopen('users.csv', 'a+');
            fputcsv($file, $user);
            fclose($file);

            echo '<div class="container alert alert-dark" role="alert">';
            echo '<h4 class="alert-heading">Поздравляем!</h4>';
            echo '<p>Вы были успешно зарегистрированы.</p>';
            echo '<hr>';
            echo '<p class="mb-0">Войдите в личный кабинет.</p>';
            echo '</div>';
            include "./login.html";
        } elseif ($password == $password2 & !recaptcha()) {
            $message = '<div class="alert alert-dark">Ты - робот!</div>';
            include "./registration.html";
        } else {
            $message = '<div class="alert alert-dark">Пароли не совпадают</div>';
            include "./registration.html";
        }
    }
} else {
    if (!empty($_POST['logOut'])) {
        logOut();
        header('Location: index.php');
    }
    include './profile.html';
}