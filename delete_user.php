<?php

require 'DataB.php';

$pdo = new DataB();

$pdo->DeleteUser($_GET['id']);
$pdo->DeletePersonalStock([$_GET['id']]);

header('Location: Users_list.php');