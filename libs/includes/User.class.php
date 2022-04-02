<?php

class User
{
    private $conn;
    public static function signup($user, $pass, $email, $phone)
    {
        $options = [
            'cost' => 9,
        ];
        $pass = password_hash($pass, PASSWORD_BCRYPT, $options);
        $conn = Database::getConnection();
        $sql = "INSERT INTO `auth` (`username`, `password`, `email`, `phone`)
        VALUES ('$user', '$pass', '$email', '$phone');";
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
        $query = "SELECT * FROM `auth` WHERE `username` = '$user'";
        $conn = Database::getConnection();
        $result = $conn->query($query);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            //if ($row['password'] == $pass) {
            if (password_verify($pass, $row['password'])) {
                return $row;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function __construct($username)
    {
        $this->conn = Database::getConnection();
        $this->conn->query();
        $this->username = $username;

        //TODO: Write the code to fetch user data from Database for the given username. If username is not present, throw Exception.
        $this->id = null; //Update this from database.
    }

    public function authenticate()
    {
    }

    public function setBio($bio)
    {
        //TODO: Write UPDATE command to change new bio
    }

    public function getBio()
    {
        //TODO: Write SELECT command to get the bio.
    }

    public function setAvatar($link)
    {
    }

    public function getAvatar()
    {
    }
}
