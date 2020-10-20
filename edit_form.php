<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
    <form action="MainPage.php" method="post" enctype="multipart/form-data">
        <button>Главная</button>
    </form>
    <form action="add_more.php?imageId=<?= $_GET['imageId'] ?>"  method="post" enctype="multipart/form-data"><br>
        <h3>Введите кол-во пополнения:</h3>
        <input name="numberHave" type="text" required><br>
        <br><input type="submit" value="Пополнить"><br>
    </form>
</table>
<br>
<table>
    <form action="edit_number.php?imageId=<?= $_GET['imageId'] ?>"  method="post" enctype="multipart/form-data"><br>
        <h3>Изменить стоимость:</h3>
        <input name="newPrice" type="text" required><br>
        <br><input type="submit" value="Изменить"><br>
    </form>
</table>
<br>

</body>
</html>