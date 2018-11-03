<?php
    require_once "dao.php";
    session_start();
 
    $email = $_POST["email"];
    $password = $_POST["password"];
    $dao = new DAO();
    
    $isVerified = $dao->authenticateUser($email, $password);
    if ($isVerified == true) {
        $_SESSION["user"] = $email;
        header("Location: index.php");
    } else {
        $_SESSION["loginError"] = "Incorrect email or password";
        header("Location: login.php");
    }

