<?php

require_once "Database.class.php";

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
        //TODO: Write the code to fetch user data from Database for the given username. If username is not present, throw Exception.

        $this->conn = Database::getConnection();
        $this->username = $username;
        $sql = "SELECT `id` FROM `auth` WHERE `username`= '$username' LIMIT 1";
        $result = $this->conn->query($sql);
        if ($result->num_rows) {
            $row = $result->fetch_assoc();
            $this->id = $row['id']; //Updating this from database
        } else throw new Exception("Username does't exist");
    }

    //this function helps to retrieve data from the database
    private function getData($var)
    {
        if (!$this->conn) {
            $this->conn = Database::getConnection();
        }
        $sql = "SELECT `$var` FROM `users` WHERE `id` = '$this->id'";
        $result = $this->conn->query($sql);
        if ($result->num_rows) {
            return $result->fetch_assoc()["$var"];
        } else  return null;
    }

    //This function helps to  set the data in the database
    private function setData($var, $data)
    {
        if (!$this->conn) {
            $this->conn = Database::getConnection();
        }
        $sql = "UPDATE `users` SET `$var`='$data' WHERE `id`='$this->id';";
        if ($this->conn->query($sql)) {
            return true;
        } else return false;
    }

    public function authenticate()
    {
    }

    public function setBio($bio)
    {
        //TODO: Write UPDATE command to change new bio
        return $this->setData('bio', $bio);
    }

    public function getBio()
    {
        //TODO: Write SELECT command to get the bio.
        return $this->getData('bio');
    }

    public function setAvatar($link)
    {
        return $this->setData('avatar', $link);
    }

    public function getAvatar()
    {
        return $this->getData('avatar');
    }

    public function setFirstname($name)
    {
        return $this->setData("firstname", $name);
    }

    public function getFirstname()
    {
        return $this->getData('firstname');
    }

    public function setLastname($name)
    {
        return $this->setData("lastname", $name);
    }

    public function getLastname()
    {
        return $this->getData('lastname');
    }

    public function setDob($year, $month, $day)
    {
        if (checkdate($month, $day, $year)) { //checking data is valid
            return $this->setData('dob', "$year.$month.$day");
        } else return false;
    }

    public function getDob()
    {
        return $this->getData('dob');
    }

    public function setInstagramlink($link)
    {
        return $this->setData('instagram', $link);
    }

    public function getInstagramlink()
    {
        return $this->getData('instagram');
    }

    public function setTwitterlink($link)
    {
        return $this->setData('twitter', $link);
    }

    public function getTwitterlink()
    {
        return $this->getData('twitter');
    }
    public function setFacebooklink($link)
    {
        return $this->setData('facebook', $link);
    }

    public function getFacebooklink()
    {
        return $this->getData('facebook');
    }
}
