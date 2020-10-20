<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Заказ на склад</title>
</head>
<body>

<form action="add_profile.php?imageId=<?= $_GET['imageId'] ?>"  method="post" enctype="multipart/form-data"><br>
    <h3>Введите кол-во товара для заказа:</h3>
    <input name="numberHave" type="text" required><br>
    <br><input type="submit" value="Заказать">
</form>

</body>
</html>