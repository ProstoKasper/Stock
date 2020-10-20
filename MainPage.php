<?php

require 'DataB.php';

$pdo = new DataB();
$all_users = $pdo->SelectUsers();
$all_Image = $pdo->SelectImage();
$personal_stock = $pdo->SelectPersonalStock();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stock assortment</title>
</head>
<body>
<h1>Stock</h1>
<table>
    <?php
    if ($_COOKIE['id'] !== null) {
    foreach ($all_users as $user) {
        if ($_COOKIE['id'] === $user['id'] ) {
            ?><td><a>Пользователь: </a> <?= $user['login']; ?> </td> <?php
            if ($user['status'] !== null) {
                ?><td><a>(<?=$user['status'] ?>)</a></td><?php
                $flag = 1;
            }
        }
    }
    ?>
</table><br>
<table>
    <td>
        <form action="profile_form.php" method="post" enctype="multipart/form-data">
            <button>Мой профиль</button>
        </form>
    </td>
    <td>
        <form action="logout.php" method="post" enctype="multipart/form-data">
            <button>Выход</button>
        </form>
    </td>
</table>
<?php } else { ?>
    <table>
        <td>
            <form action="register.php" method="post" enctype="multipart/form-data">
                <button>Регистрация</button>
            </form>
        </td>
        <td>
            <form action="autorization_form.php" method="post" enctype="multipart/form-data">
                <button>Войти</button>
            </form>
        </td>
    </table>
<?php }

    if($flag === 1)
    {?>
    <table>
        <td>
            <form action="Users_list.php" method="post" enctype="multipart/form-data">
                <button>Список пользователей</button>
            </form>
        </td>
    </table>
<?php }?>
<h2 align="center">Ассортимент </h2>
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
                    <a>Описание товара: <?= $image['name'] ?></a>
                </td>
            </tr>
            <tr>
                <td>
                    <a>На складе: <?= $image['number'] ?> шт.</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a>Стоимость за штуку: <?= $image['price'] ?> р.</a>
                </td>
            </tr>
            <?php
            if($_COOKIE['id'] !== null && $flag !== 1) {
                ?>
            <tr>
                <td>
                    <p align="center"><a href="add_form.php?imageId=<?= $image['id']?>">Заказать</a></p>
                </td>
            </tr>
                <?php }?>
            <br>
                <?php
                if($flag === 1 ) {
            ?>
            <tr>
                <td>
                    <p align="center"><a href="delete.php?id=<?= $image['imageName']?>">Удалить</a></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p align="center"><a href="edit_form.php?imageId=<?= $image['id'] ?>">Редактировать</a></p>
                </td>
            </tr>
    <?php   }
} ?>
</body>
</html>
