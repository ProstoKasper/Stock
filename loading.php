<?php
require 'DataB.php';

$pdo = new DataB();
$selectLogin = $pdo->SelectUsers();

if (!file_exists("images"))
{
    mkdir("images", 0777);
}

$filename = date_create_from_format('U.u' , microtime(true))->format('Y_m_d_H_i_s_u');
$ext = explode(".", $_FILES['image']['name']);
$ext = array_pop($ext);
$filename = $filename . "." . $ext;

move_uploaded_file($_FILES['image']['tmp_name'], "images" . DIRECTORY_SEPARATOR . $filename);

$normalName = $_POST['name'];

$pdo->InsertImage([$filename,$normalName,$_COOKIE['id'],$_POST['numberHave'],$_POST['price']]);

header('Location: loading_form.php');