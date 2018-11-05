<?php

require_once "functions.php";
require_once "review.php";

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

    public function deleteUser($userID) {
        $conn = $this->getConnection();
        $deleteQuery = "DELETE FROM Users WHERE user_id = :userID";
        $query = $conn->prepare($deleteQuery);
        $query->bindParam(":userID", $userID);
        return $query->execute();
    }

    public function getUserID($email) {
        $conn = $this->getConnection();
        $IDQuery = "SELECT user_id FROM Users WHERE email = :email";
        $query = $conn->prepare($IDQuery);
        $query->bindParam(":email", $email);
        $query->execute();
        $row = $query->fetch();
        return $row["user_id"];
    }

    public function getUserEmail($userID) {
        $conn = $this->getConnection();
        $emailQuery = "SELECT email FROM Users WHERE user_id = :userID";
        $query = $conn->prepare($emailQuery);
        $query->bindParam(":userID", $userID);
        $query->execute();
        $row = $query->fetch();
        return $row["email"];
    }

    public function createReview($userEmail, $companyName, $jobTitle, $rating, $comment) {
        $createReviewQuery = "INSERT INTO Ratings(user_email, user_internship_title,
            company_name, rating, comment) VALUES(:userEmail, :jobTitle, :companyName,
            :rating, :comment)";
        $conn = $this->getConnection();
        $query = $conn->prepare($createReviewQuery);
        $query->bindParam(":userEmail", $userEmail);
        $query->bindParam(":jobTitle", $jobTitle);
        $query->bindParam(":companyName", $companyName);
        $query->bindParam(":rating", $rating);
        $query->bindParam(":comment", $comment);
        return $query->execute();
    }

    public function getReviews() {
        $getReviewsQuery = "SELECT * FROM Ratings";
        $conn = $this->getConnection();
        $reviews = [];
        foreach($conn->query($getReviewsQuery) as $row) {
            $reviews[] = new Review(
                htmlentities($row["rating_id"]),
                htmlentities($row["user_id"]),
                htmlentities($row["user_internship_title"]),
                htmlentities($row["company_name"]),
                htmlentities($row["rating"]),
                htmlentities($row["comment"]),
                htmlentities($row["create_date"]),
                htmlentities($row["update_date"])
            );
        }
        return $reviews;
    }

}
