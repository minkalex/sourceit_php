<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Homework 4</title>
    <link href="bootstrap.min.css" rel="stylesheet">
</head>
<body>
<form method="post">
    <div class="container">
        <!---------------------------------------------------------------------------------->
        <h1 align="center">Задача 1</h1>
        <h3>Введите город</h3>
        <div class="form-row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Город" name="city">
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-dark" name="submit">Вывести на экран</button>
        <br>
        <br>
        <?php
            if (isset($_POST[submit]) && $_POST[city]) {
                $city = $_POST["city"];
                echo "<h3>Ваш город: $city</h3>";
            }
        ?>
    </div>
        <!---------------------------------------------------------------------------------->
    <div class='container'>
        <h1 align="center">Задача 2</h1>
    </div>
    <?php
    if (isset($_POST[submit2]) && $_POST[city2]) {
        echo "<div hidden class='container'>";
    } else {
        echo "<div class='container'>";
    }
    ?>
        <h3>Введите город</h3>
        <div class="form-row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Город" name="city2">
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-dark" name="submit2">Вывести на экран</button>
        <br>
        <br>
    </div>
    <div class='container'>
        <?php
        if (isset($_POST[submit2]) && $_POST[city2]) {
            $city2 = $_POST["city2"];
            echo "<h3>Ваш город: $city2</h3>";
        }
        ?>
    </div>
        <!---------------------------------------------------------------------------------->
    <div class='container'>
        <h1 align="center">Задача 3</h1>
        <h3>Введите имя</h3>
        <div class="form-row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Имя" name="name">
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-dark" name="submit3">Вывести на экран</button>
        <br>
        <br>
        <?php
        if (isset($_POST[submit3]) && $_POST[name]) {
            $name = $_POST["name"];
            echo "<h3>Привет, $name</h3>";
        }
        ?>
    </div>
    <!---------------------------------------------------------------------------------->
    <div class='container'>
        <h1 align="center">Задача 4</h1>
        <h3>Введите имя</h3>
        <div class="form-row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Имя" name="name2"><br>
                <h3>Введите возраст</h3>
                <input type="text" class="form-control" placeholder="Возраст" name="age"><br>
                <h3>Введите сообщение</h3>
                <textarea class="form-control" rows="3" placeholder="Сообщение" name="message"></textarea>
        <br>
        <button type="submit" class="btn btn-dark" name="submit4">Вывести на экран</button>
        <br>
        <br>
        <?php
        if (isset($_POST[submit4]) && $_POST[name2] && $_POST[age] && $_POST[message]) {
            $name2 = $_POST["name2"];
            $age = $_POST["age"];
            $message = strip_tags($_POST["message"]);
            echo "<h3>Привет, $name2, $age лет.<br>Твое сообщение: $message</h3>";
        }
        ?>
            </div>
        </div>
    </div>
    <!---------------------------------------------------------------------------------->
    <div class='container'>
        <h1 align="center">Задача 5</h1>
    </div>
    <?php
    if (isset($_POST[submit5]) && $_POST[age2]) {
        echo "<div hidden class='container'>";
    } else {
        echo "<div class='container'>";
    }
    ?>
    <h3>Введите возраст</h3>
    <div class="form-row">
        <div class="col">
            <input type="text" class="form-control" placeholder="Возраст" name="age2">
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-dark" name="submit5">Вывести на экран</button>
    <br>
    <br>
    </div>
    <div class='container'>
        <?php
        if (isset($_POST[submit5]) && $_POST[age2]) {
            $age2 = $_POST["age2"];
            echo "<h3>Ваш возраст: $age2</h3>";
        }
        ?>
    </div>
    <!---------------------------------------------------------------------------------->
    <div class="container" align="center">
        <h1>Задача 6</h1>
        <h3>Введите логин и пароль</h3>
            <div class="col-2">
                <input type="text" class="form-control" placeholder="Логин" name="login">
                <input type="password" class="form-control" placeholder="Пароль" name="password">
            </div>
        <br>
        <button type="submit" class="btn btn-dark" name="submit6">Проверка</button>
        <br>
        <br>
        <?php
        $login = "admin";
        $password = "admin";
        if (isset($_POST[submit6]) && $_POST[login] && $_POST[password]) {
            if (rtrim($_POST[login]) == $login && rtrim($_POST[password]) == $password) {
                echo "<h3>Доступ разрешен!</h3>";
            } else {
                echo "<h3>Доступ запрещен!</h3>";
            }
        }
        ?>
    </div>
    <!---------------------------------------------------------------------------------->
    <div class="container">
        <h1 align="center">Задача 7**</h1>
        <h3>Введите город</h3>
        <div class="form-row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Город" name="city3">
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-dark" name="submit">Поиск</button>
        <br>
        <br>
        <?php
        $cities = ["Харьков", "Харьковский Град", "Киев", "Киевлэнд", "Урал"];
        if (isset($_POST[submit]) && $_POST[city3]) {
            foreach ($cities as $city) {
                if (stripos($city, $_POST[city3]) !== false) {
                    echo "<h3>$city</h3>";
                }
            }
        }
        ?>
    </div>
</form>
</body>
</html>