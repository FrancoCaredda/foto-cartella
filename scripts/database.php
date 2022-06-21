<?php

declare(strict_types=1);

require_once "user_data.php";
require_once "image_data.php";

define("USER", 1);
define("NOONE", 2);
define("ADMIN", 3);

interface IDatabase {
    public function Connect(): bool;
    public function Close(): void;
    public function RegisterUser(UserData $data): void;
    public function LoadAllUsers(): void;
    public function LoadImagesById(int $id): bool;
    public function LoadImagesByTag(string $hashtag): bool;
    public function Login(UserData $data): bool;
    public function DeleteUser(int $userId): void;
    public function AddPost(ImageData $imageData): void;
    public function DeletePosts(int $userId);
}

class Database implements IDatabase {
    private string $server;
    private string $user;
    private string $password;
    private string $databaseName;
    private mysqli $database;

    function __construct(string $server, string $user, string $password, string $databaseName) {
        $this->server = $server;
        $this->user = $user;
        $this->password = $password;
        $this->databaseName = $databaseName;
    }

    public function Connect(): bool {
        $this->database = new mysqli(
            $this->server, 
            $this->user, 
            $this->password, 
            $this->databaseName
        );

        if ($this->database->connect_error) {
            print $this->database->connect_error;
            return false;
        }

        return true;
    }

    public function Close(): void {
        $this->database->close();
    }

    public function RegisterUser(UserData $data): void {
        $this->database->query("INSERT INTO `users` (`name`, `password`, `birthday`, `email`) 
                                VALUES ('" . $data->GetName() . "', '" . $data->GetPassword() . "', '" .
                                $data->GetBirthday() . "', '" . $data->GetEmail() . "')");

        $data = $this->database->query("SELECT * FROM `users` WHERE `email`='" . $data->GetEmail() . "' AND `password`='" . $data->GetPassword() . "'");

        $jsonData = array();
        if ($data->num_rows > 0) {
            while ($array = $data->fetch_assoc()) {
                $jsonData[] = $array;
            }
            
            echo json_encode($jsonData);
        }
    }

    public function DoesAccountExist(UserData $data, &$sql): bool {
        $sqlResult = $this->database->query("SELECT * FROM `users` WHERE `email`='". 
                                $data->GetEmail() ."' AND `password`='".$data->GetPassword()."'");
        
        if ($sqlResult->num_rows > 0) {
            $sql = $sqlResult;
            return true;
        }

        return false;
    }

    public function Login(UserData $data): bool {
        $sql = null;
        if ($this->DoesAccountExist($data, $sql)) {
            $associativeArray = $sql->fetch_assoc();

            echo json_encode($associativeArray);

            return true;
        }

        return false;
    }

    public function LoadImagesById(int $id): bool {
        if ($id == -1) {
            $data = $this->database->query("SELECT * FROM `photos`");

            $jsonData = array();
            if ($data->num_rows > 0) {
                while ($array = $data->fetch_assoc()) {
                    $jsonData[] = $array;
                }
                
                echo json_encode($jsonData);
                return true;
            }

            return false;
        }
        
        $data = $this->database->query("SELECT * FROM `photos` WHERE `author_id`='". $id ."'");

        $jsonData = array();
        if ($data->num_rows > 0) {
            while ($array = $data->fetch_assoc()) {
                $jsonData[] = $array;
            }
            
            echo json_encode($jsonData);
            return true;
        }
        return false;
    }

    public function LoadImagesByTag(string $hashtag): bool {
        $data = $this->database->query("SELECT * FROM `photos` WHERE `hashtag`='". $hashtag ."'");

        $jsonData = array();
        if ($data->num_rows > 0) {
            while ($array = $data->fetch_assoc()) {
                $jsonData[] = $array;
            }
            
            echo json_encode($jsonData);
            return true;
        }
        return false;
    }

    public function LoadAllUsers(): void {
        $data = $this->database->query("SELECT * FROM `users`");

        $jsonData = array();
        if ($data->num_rows > 0) {
            while ($array = $data->fetch_assoc()) {
                $jsonData[] = $array;
            }
            
            echo json_encode($jsonData);
        }

    }

    public function DeleteUser(int $userId): void {
        $this->database->query("DELETE FROM `users` WHERE `id`='" . $userId . "'");
    }

    public function AddPost(ImageData $imageData): void {
        $this->database->query("INSERT INTO `photos` (`name`, `author`, `author_id`, `url`, `hashtag`)  VALUES ('" . $imageData->GetName() . "', '" . $imageData->GatAuthor() . "', '" . $imageData->GetAuthorId() . "', '" . $imageData->GetUrl() . "', '". $imageData->GetHashtag() ."')");
    }

    public function DeletePosts(int $userId) {
        $this->database->query("DELETE FROM `photos` WHERE `author_id`='" . $userId . "'");
    }
}

class SecureDatabase implements IDatabase {
    private Database $database;
    private int $userRole;

    function __construct(string $server, 
                         string $user, 
                         string $password,
                         string $databaseName,
                         int $userRole) {
        $this->database = new Database($server, $user, $password, $databaseName);
        $this->userRole = $userRole; 
    }

    public function Connect(): bool {
        return $this->database->Connect();
    }

    public function Close(): void {
        $this->database->Close();
    }

    public function RegisterUser(UserData $data): void {
        $this->database->RegisterUser($data);
    }

    public function Login(UserData $data): bool {
        return $this->database->Login($data);
    }

    public function DeleteUser(int $userId): void {
        if ($this->CheckAdmin()) { 
            $this->database->DeleteUser($userId);
        }
    }

    public function AddPost(ImageData $imageData): void {
        $this->database->AddPost($imageData);
    }

    public function LoadImagesById(int $id): bool {
        return $this->database->LoadImagesById($id);
    }

    public function LoadImagesByTag(string $hashtag): bool {
        return $this->database->LoadImagesByTag($hashtag);
    }

    public function LoadAllUsers(): void {
        if ($this->CheckAdmin()) {
            $this->database->LoadAllUsers();
        }
    }

    public function DeletePosts(int $userId) {
        if ($this->CheckAdmin()) {
            $this->database->DeletePosts($userId);
        }
    }

    public function SetRole(int $role): void {
        $this->userRole = $role;
    }

    private function CheckAdmin(): bool {
        return $this->userRole == ADMIN;
    }

    private function CheckUser(): bool{
        return $this->userRole == USER;
    }
}