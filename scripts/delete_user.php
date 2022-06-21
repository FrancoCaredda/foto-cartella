<?php

declare(strict_types=1);

require_once "connection.php";
require_once "post.php";

$id = null;
$role = null;
if (GetPostData("role", $role) &&
    GetPostData("id", $id)) {
    $database->Connect();
    
    $database->SetRole(intval($role));
    $database->DeleteUser(intval($id));
    $database->DeletePosts(intval($id));

    $database->Close();

    exit();
}

echo "Error";