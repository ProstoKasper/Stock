<?php
function send_back(){
    header("location: MainPage.php");
}

setcookie("id", $_COOKIE['id'], time() - 60 * 60 * 24 * 30, "/");
send_back();
