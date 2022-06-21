<?php

declare(strict_types=1);

require_once "connection.php";
require_once "user_data.php";
require_once "post.php";

$name = "";
$password = "";
$email = "";
$birthday = "";

if (GetPostData("name", $name) && 
    GetPostData("password", $password) &&
    GetPostData("email", $email) &&
    GetPostData("birthday", $birthday)) {
    $database->Connect();
    $user = new UserData($name, $password, $birthday, $email);
    $database->RegisterUser($user);
    $database->Close();
}