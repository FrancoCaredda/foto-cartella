<?php

declare(strict_types=1);

require_once "connection.php";
require_once "post.php";

$role = null;
if (GetPostData("role", $role)) {
    $database->Connect();
    
    $database->SetRole(intval($role));
    $database->LoadAllUsers();

    $database->Close();

    exit();
}

echo "Error";