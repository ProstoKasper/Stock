<?php
require 'DataB.php';

$pdo = new DataB();
$all_logins_password = $pdo->SelectUsers();

$login = $_POST['login'];
$password = $_POST['password'];

$name = '';
$flag = 0;

foreach($all_logins_password as $RowUserLogin)
{
    if ($login === $RowUserLogin['login'] && $password === $RowUserLogin['password']){
        setcookie("id", $RowUserLogin['id'], time()+60*60*24*30, "/");
        $name = $RowUserLogin['login'];
        $flag = 1;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добро пожаловать</title>
</head>
<body><?php if($flag === 1){?>
<h1>Добро пожаловать <?php echo $name; ?> !</h1>
<form action="MainPage.php" method="post">
    <button>Главная</button>
</form>
<?php }else{
        echo 'Неверный логин или пароль попробуйте снова.';
    ?><br>
<form action="autorization_form.php" method="post">
    <button>Попробовать снова</button>
</form>
<?php } ?>
</body>
</html>
