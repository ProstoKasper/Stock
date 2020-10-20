<?php

require 'DataB.php';

$pdo = new DataB();
$selectImage = $pdo->SelectImage();
$personal_stock = $pdo->SelectPersonalStock();

$imageId = $_GET['imageId'];
$numbersHave = $_POST['numberHave'];
$userId = $_COOKIE['id'];

$flag = 0;

foreach ($personal_stock as $value)
{
    if ($value['image_id'] === $imageId && $userId === $value['user_id']){
        $flag = 1;
    }
}

if ($flag === 0)
{
    $pdo->UpdateImage([$numbersHave,$imageId]);
    $pdo->InsertPersonalStock([$numbersHave,$imageId,$userId]);
}
if ($flag === 1)
{
    $pdo->UpdateImage([$numbersHave,$imageId]);
    $pdo->UpdatePersonalStock($numbersHave,$userId);
}

header('Location: profile_form.php');


