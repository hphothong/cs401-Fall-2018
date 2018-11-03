<?php
    session_start();
    require_once "dao.php";
    $dao = new DAO();
    if ($dao->deleteUser($_SESSION["user"])) {
        session_destroy();
        header("Location: index.php");
    } else {
        require_once "header.php";
        echo "<h1>Unable to delete the account</h1>";
        echo "<h2>Please try again</h2>";
    }
