<?php

session_start();

require_once "dao.php";
require_once "functions.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$degree = $_POST["degree"];
$email = $_POST["email"];
$password = $_POST["password"];
$passwordVerify = $_POST["passwordVerify"];

$_SESSION["presets"] = [];

if (validateEmail($_POST["email"])) {
    if ($password === $passwordVerify) {
        $dao = new DAO();
        if ($dao->createUser($email, $password, $fname, $lname, $degree)) {
            $_SESSION["user"] = $dao->getUserID($email);
            header("Location: index.php");
            exit;
        } else {
            $_SESSION["signupError"] = "Unable to create your account. Please try again!";
        }
    } else {
        $_SESSION["signupError"] = "Passwords do not match";
    }
} else {
    $_SESSION["signupError"] = "Invalid email address";
}

$_SESSION["presets"]["fname"] = $fname;
$_SESSION["presets"]["lname"] = $lname;
$_SESSION["presets"]["degree"] = $degree;
$_SESSION["presets"]["email"] = $email;

if (!$password) {
    $_SESSION["signupErrors"]["password"] = "*Required";
}
if (!$passwordVerify) {
    $_SESSION["signupErrors"]["passwordVerify"] = "*Required";
}
if (!$email) {
    $_SESSION["signupErrors"]["email"] = "*Required";
}

header("Location: signup.php");
