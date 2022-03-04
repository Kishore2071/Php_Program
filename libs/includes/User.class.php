<?php

class User
{
    private $conn;
    public static function signup($user, $pass, $email, $phone)
    {
        $pass = md5($pass);
        $conn = Database::getConnection();
        $sql = "INSERT INTO `auth` (`username`, `password`, `email`, `phone`, `active`)
        VALUES ('$user', '$pass', '$email', '$phone', '1');";
        $error = false;
        if ($conn->query($sql) === true) {
            $error = false;
        } else {
            // echo "Error: " . $sql . "<br>" . $conn->error;
            $error = $conn->error;
        }
    
        // $conn->close();
        return $error;
    }

    public static function login($user, $pass)
    {
    }

    public function __construct($username)
    {
        $this->conn = Database::getConnection();
        $this->conn->query();
    }

    public function authenticate()
    {
    }

    public function setBio()
    {
    }

    public function getBio()
    {
    }

    public function setAvatar()
    {
    }

    public function getAvatar()
    {
    }
}
