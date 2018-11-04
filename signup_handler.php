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

    if ($email && validateEmail($_POST["email"])) {
        if ($password && $password === $passwordVerify) {
            $dao = new DAO();
            if ($dao->createUser($email, $password, $fname, $lname, $degree)) {
                $_SESSION["user"] = $email;
                header("Location: index.php");
            } else {
                $_SESSION["signupError"] = "Invalid email address";
                $_SESSION["presets"]["fname"] = $fname;
                $_SESSION["presets"]["lname"] = $lname;
                $_SESSION["presets"]["degree"] = $degree;
                $_SESSION["presets"]["email"] = $email;
                header("Location: signup.php");
            }
        } else {
            if ($password && $passwordVerify) {
                $_SESSION["signupError"] = "Passwords did not match";
            } else if (!$password && $passwordVerify) {
                $_SESSION["signupError"] = "Password is required";
            } else {
                $_SESSION["signupError"] = "Password is required twice";
            }
            $_SESSION["presets"]["fname"] = $fname;
            $_SESSION["presets"]["lname"] = $lname;
            $_SESSION["presets"]["degree"] = $degree;
            $_SESSION["presets"]["email"] = $email;
            header("Location: signup.php");
        }
    } else {
        if ($email) {
            $_SESSION["signupError"] = "Invalid email address";
        } else {
            $_SESSION["signupError"] = "Email address is required";
        }
        $_SESSION["presets"]["fname"] = $fname;
        $_SESSION["presets"]["lname"] = $lname;
        $_SESSION["presets"]["degree"] = $degree;
        $_SESSION["presets"]["email"] = $email;
        header("Location: signup.php");
    }

