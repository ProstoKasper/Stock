<?php

require 'DataB.php';

$pdo = new DataB();

$selectImage = $pdo->SelectImage();
$personal_stock = $pdo->SelectPersonalStock();


$numbersHave = $_POST['numberHave'];

$value = explode(" ", $_GET['imageIdUserId']);
$imageId = $value[0];
$userId = $value[1];


$flag = 0;

foreach ($personal_stock as $value)
{
    if ($value['image_id'] === $imageId && $userId === $value['user_id']){
        $flag = 1;
    }
}

if ($flag === 1)
{
    $pdo->UpdatePersonalStockMinus($numbersHave,$userId);
}

header('Location: Users_list.php');