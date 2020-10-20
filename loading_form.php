<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Загрузка</title>
</head>
<body>
<form action="MainPage.php" method="post" enctype="multipart/form-data">
    <button>Главная</button>
</form>

<table>
    <td>
    <form action="loading.php"  method="post" enctype="multipart/form-data"><br>
        <h3>Фото товара:</h3>
        <input type="file" name="image"><br>
        <h3>Описание товара:</h3>
        <textarea name="name"></textarea><br>
        <h3>Кол-во товара:</h3>
        <input name="numberHave" type="text" required><br>
        <h3>Цена товара (за штуку):</h3>
        <input name="price" type="text" required><br>
        <br><input type="submit" >
    </form>
    </td>
</table>
</body>
</html>