<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация Kasperwill</title>
</head>
<body>
<form action="autorization.php" method="post">
    <p>Логин</p>
    <input name="login" type="text" required><br>
    <p>Пароль</p>
    <input name="password" type="password" required><br>
    <br><input name="submit" type="submit" value="Войти">
</form><br>
<form action="MainPage.php" method="post" enctype="multipart/form-data">
    <button>Главная</button>
</form>
</body>
</html>
