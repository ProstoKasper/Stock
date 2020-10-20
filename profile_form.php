<?php
require 'DataB.php';

$pdo = new DataB();
$all_users = $pdo->SelectUsers();
$all_Image = $pdo->SelectImage();
$personal_stock = $pdo->SelectPersonalStock()
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Мой профиль</title>
</head>
<body>
<h1>Пользователь:<?php
    foreach ($all_users as $login) {
        if ($_COOKIE['id'] === $login['id']) {
            ?><td> <?= $login['login']; ?> </td><?php
            if($login['status'] !== null) {
                ?><td><a>(<?=$login['status']; ?>)</a></td><?php
                $flag = 1;
            }
        }
    }
    ?></h1>
<table cellpadding="7">
    <?php if($flag === 1){ ?>
    <td>
        <form action="loading_form.php" method="post" enctype="multipart/form-data">
            <button>Загрузить</button>
        </form>
    </td>
    <?php } ?>
    <td>
        <form action="MainPage.php" method="post" enctype="multipart/form-data">
            <button>Главная</button>
        </form>
    </td>
    <td>
        <form action="logout.php" method="post" enctype="multipart/form-data">
            <button>Выход</button>
        </form>
    </td>
</table>
<?php
if($flag !== 1)
{
    $cost = 0;
    $price = 0;
    $number = 0;
    $number1 = 0;

    foreach ($all_Image as $image
    ){
        foreach ($personal_stock as $value)
        {
            if($image['id'] === $value['image_id'] && $_COOKIE['id'] === $value['user_id']){
                $price = $image['price'];
                $number = $value['number_have'];
                $number1 = $number1 + $number;
                $cost += $number * $price;

            }
        }
    }


?><h3>Стоимость товаров на складе (в рублях): <?= $cost;
}
?></h3>
<h2 align="center">В наличии на складе</h2>
<?php


foreach ($all_Image as $image) {
    ?>
        <table align="center" border="2" bordercolor="Blue">
            <tbody>
            <tr>
                <td>
                    <img src="images/<?= $image['imageName'] ?>" width="250px" alt="Ошибка">
                </td>
            </tr>
            <tr>
                <td>
                    <?= $image['name'] ?>
                </td>
            </tr>
            <?php
            foreach ($personal_stock as $number) {
                if ($number['image_id'] === $image['id'] && $number['user_id'] === $_COOKIE['id']) {
                    ?>
            <tr>
                <td>
                    <?= $number['number_have']; ?>
                </td>
            </tr>
<?php
                }
            }
            if($flag === 1 ) {
                ?>
            <tr>
                <td>
                    <p align="center"><a href="delete.php?id=<?= $image['imageName'] ?>">Удалить</a></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p align="center"><a href="delete.php?id=<?= $image['number'] ?>">Редактировать</a></p>
                </td>
            </tr>
            <?php
            } ?>
            </tbody>
        </table><br>
<?php
} ?>
</body>
</html>