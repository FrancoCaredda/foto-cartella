<?php

declare(strict_types=1);

require_once "user_data.php";
require_once "connection.php";
require_once "post.php";

$email = null;
$password = null;

if (GetPostData("password", $password) &&
    GetPostData("email", $email)) {
    $database->Connect();
    $userData = new UserData("", $password, "", $email);
    if (!$database->Login($userData))
        echo "No";
    $database->SetRole(USER);
} else {
    echo "Error";
}

$database->Close();
