<?php

require_once "connection.php";
require_once "post.php";

$name = null;
$author = null;
$author_id = null;
$url = null;
$role = null;
$hashtag = null;

if (GetPostData("name", $name) && 
    GetPostData("author", $author) &&
    GetPostData("authorId", $author_id) &&
    GetPostData("url", $url) &&
    GetPostData("role", $role) &&
    GetPostData("hashtag", $hashtag)) {

    $image = new ImageData($name, $author, $author_id, $url, $hashtag);

    $database->SetRole(intval($role));
    $database->Connect();

    $database->AddPost($image);

    $database->Close();
    
    echo "Good";
    exit();
}

echo "Error";