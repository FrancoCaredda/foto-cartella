<?php

declare(strict_types=1);

require_once "connection.php";
require_once "post.php";

$data = null;
if (GetPostData("data", $data)) {
    $database->Connect();
    
    if (is_numeric($data)) {
        if (!$database->LoadImagesById(intval($data))) {
            echo "Empty";
        }
        exit();
    }
    
    if (!$database->LoadImagesByTag($data)) {
        echo "Empty";
    }
    exit();
}

echo "Error";