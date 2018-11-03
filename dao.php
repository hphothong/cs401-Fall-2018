<?php

require_once "functions.php";

class Dao {

    private $HOST = "tk3mehkfmmrhjg0b.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    private $USER = "s1l4w062bsqkrvj2";
    private $PASS = "e9d216hrz14pllhl";
    private $DB = "uoa9syytcbaph7b3";

    public function getConnection() {
       return new PDO("mysql:host={$this->HOST};dbname={$this->DB}", $this->USER, $this->PASS);
    }
    
    public function getPasswordHash($password) {
        $salt = ")95sher4ejrh^qwu45u463k%(wg$3hq*u4w5#46&@#whr4^j!i6%i";
        $options = [
            "salt" => $salt,
            "cost" => 12
        ];
        $hash = password_hash($password, PASSWORD_DEFAULT, $options);
        return $hash;
    }

    public function userExists($email) {
        $conn = $this->getConnection();
        $searchQuery = "SELECT COUNT(*) AS userExists WHERE email = :email";
        $query = $conn->prepare($searchQuery);
        $query->bindParam(":email", $email);
        $query->execute();
        $userExists = $query->fetch()["userExists"];
        if ($userExists === 1) {
            return true;
        } else {
            return false;
        }
    }

    public function createUser($email, $password, $fname="", $lname="", $degree="") {
        if (validateEmail($email) && !$this->userExists($email)) {
            $hash = $this->getPasswordHash($password);
            $conn = $this->getConnection();
            $createUserQuery = "INSERT INTO Users(email, password, fname, lname, degree)
                VALUES(:email, :hash, :fname, :lname, :degree);";
            $query = $conn->prepare($createUserQuery);
            $query->bindParam(":email", $email);
            $query->bindParam(":hash", $hash);
            $query->bindParam(":fname", $fname);
            $query->bindParam(":lname", $lname);
            $query->bindParam(":degree", $degree);
            return $query->execute();
        } else {
            return false;
        }
    }

    public function authenticateUser($email, $password) {
        $hash = $this->getPasswordHash($password);
        $conn = $this->getConnection();
        $authenticateQuery = "SELECT COUNT(*) AS userAuthenticated FROM Users WHERE email = :email
            AND password = :hash";
        $query = $conn->prepare($authenticateQuery);
        $query->bindParam(":email", $email);
        $query->bindParam(":hash", $hash);
        $query->execute();
        $row = $query->fetch();
        $userAuthenticated = $row["userAuthenticated"];
        if ($userAuthenticated) {
            return true;
        } else {
            return false;
        }
    }

}
