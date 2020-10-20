<?php

require 'DataB.php';

$pdo = new DataB();
$selectImage = $pdo->SelectImage();
$personal_stock = $pdo->SelectPersonalStock();

$imageId = $_GET['imageId'];
$numbersHave = $_POST['numberHave'];

$pdo->AddImageNumber([$numbersHave,$imageId]);

header('Location: MainPage.php');