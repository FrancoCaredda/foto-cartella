<?php

declare(strict_types=1);

function GetPostData(string $field, &$result): bool {
    if (!empty($_POST[$field])) {
        $result = $_POST[$field];
        return true;
    }

    return false;
}

function GetData(string $field, &$result): bool {
    if (!empty($_GET[$field])) {
        $result = $_GET[$field];
        return true;
    }

    return false;
}