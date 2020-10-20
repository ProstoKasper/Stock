<?php

require 'DataB.php';

$pdo = new DataB();
$selectImage = $pdo->SelectImage();
$personal_stock = $pdo->SelectPersonalStock();

$imageId = $_GET['imageId'];
$newPrice = $_POST['newPrice'];

$pdo->UpdateImageNumber($newPrice,$imageId);

header('Location: MainPage.php');