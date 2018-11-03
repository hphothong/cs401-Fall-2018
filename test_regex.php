<?php
    require_once "functions.php";

    $email = "H!#j$%r5'*8+-9/=1?^3_`4{|h@hotmail.com";
    if (validateEmail($email)) {
        echo "Passed\n";
    } else {
        echo $email . "\n";
    }

    $email = "hphothong@live";
    if (validateEmail($email)) {
        echo $email . "\n";
    } else {
        echo "Passed\n";
    }

    $email = ".asdf@hotmail.com";
    if (validateEmail($email)) {
        echo $email . "\n";
    } else {
        echo "Passed\n";
    }

    $email = "hphothong@live.co.uk";
    if (validateEmail($email)) {
        echo "Passed\n";
    } else {
        echo $email . "\n";
    }
