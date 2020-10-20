<?php
require 'DataB.php';

$pdo = new DataB();

$selectLogin = $pdo->SelectUsers();
$pdo->InsertLogPas([$login,$password]);
$all_logins = $pdo->SelectUsers();

$login = $_POST['login'];
$password = $_POST['password'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация Kasperwill</title>
</head>
<body>

<table>
    <td>
        <form action="autorization_form.php" method="post" enctype="multipart/form-data">
            <button>Войти</button>
        </form>
    </td>
    <td>
        <form action="MainPage.php" method="post" enctype="multipart/form-data">
            <button>Главная</button>
        </form>
    </td>
</table>
<form method="POST">
    <p>Логин</p>
    <input name="login" type="text" required><br>
    <p>Пароль</p>
    <input name="password" type="password" required><br>
    <br><input name="submit" type="submit" value="Зарегистрироваться"><br>
    <?php
    $flag = 0;
    foreach ($all_logins as $value) {
        if ($login === $value['login']) {
            $flag = 1;
        }
    }
    if ($flag == 1) {
        echo "Данный логин уже зарегестрирован";
    }
    ?><br>
    <?php
    if (strlen($login) <= 30 && strlen($password) <= 30 && $flag != 1 && $login != null) {
        $pdo->InsertLogPas([$login, $password]);
        echo "Вы успешно зарегестрировались. Добро пожалвать в Kasperwill";
    }
    if (strlen($login) > 30) {
        echo "Ошибка! логин не должен превышать 30 символов!!!"; ?><br><?php
    }
    if (strlen($password) > 30) {
        echo "Ошибка! пароль не должен превышать 30 символов!!!";
    }

    ?><br>
</form>
</body>
</html>