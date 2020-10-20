<?php
require 'DataB.php';

$pdo = new DataB();

$pdo->DeleteImage();

unlink('images' . DIRECTORY_SEPARATOR . $_GET['id']);

header('Location: profile_form.php');
