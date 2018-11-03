<?php

    require_once "Dao.php";

    $email = "hi@live.com";
    $password = "hi";
    $dao = new DAO();
    $conn = $dao->getConnection();
    $hash = $dao->getPasswordHash($password);
    $authenticateQuery = "SELECT COUNT(*) FROM Users WHERE email = :email
            AND password = :hash";
    $query = $conn->prepare($authenticateQuery);
    $query->bindParam(":email", $email);
    $query->bindParam(":hash", $hash);
    $query->execute();
    $result = $query->fetch();
    foreach ($result as $value) {
        echo $value . "\n";
    }
