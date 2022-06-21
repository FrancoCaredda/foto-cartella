<?php

declare(strict_types=1);

class UserData {
    private string $name;
    private string $password;
    private string $birthday;
    private string $email;

    function __construct(string $name, 
                       string $password, 
                       string $birthday, 
                       string $email) {
        $this->name = $name;
        $this->password = $password;
        $this->birthday = $birthday;
        $this->email = $email;
    }

    public function SetName(string $name): void {
        if (!empty($name)) {
            $this->name = $name;
        }
    }

    public function GetName(): string {
        return $this->name;
    }

    public function SetPassword(string $password): void {
        if (!empty($name)) {
            $this->password = $password;
        }
    }

    public function GetPassword(): string {
        return $this->password;
    }

    public function SetBirthday(string $birthday): void {
        if (!empty($birthday)) {
            $this->birthday = $birthday;
        }
    }

    public function GetBirthday(): string {
        return $this->birthday;
    }

    public function SetEmail(string $email): void {
        if (!empty($email)) {
            $this->email = $email;
        }
    }

    public function GetEmail(): string {
        return $this->email;
    }
}