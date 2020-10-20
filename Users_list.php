<?php

require 'DataB.php';

$pdo = new DataB();

$all_users = $pdo->SelectUsers();
$personal_stock = $pdo->SelectPersonalStock();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users list</title>
</head>
<body>

<form action="MainPage.php" method="post" enctype="multipart/form-data">
    <button>Главная</button>
</form><br>

    <table border="2">
            <?php
            foreach ($all_users as $user){
                ?>
                <tr>
                    <td>
                        <p align="center"><a href="look_profile.php?id=<?= $user['id'] ?>"><?= $user['login'] ?></a></p>
                    </td>
                </tr>
                <?php
            }
            ?>
    </table>

</body>
</html>