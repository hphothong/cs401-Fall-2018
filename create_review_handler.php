<?php
    session_start();

    require_once "dao.php";

    $email = $_SESSION["user"];
    $companyName = $_POST["company_name"];
    $jobTitle = $_POST["job_title"];
    $rating = $_POST["rating"];
    $comment = $_POST["comment"];

    if ($companyName && $jobTitle && $rating && $comment) {
        $dao = new Dao();
        $successful = $dao->createReview($email, $companyName, $jobTitle, $rating, $comment);
        if ($successful) {
            $_SESSION["status"] = "Thank you for submitting your review!";
            header("Location: create_review.php"); 
            exit;
        } else {
            $_SESSION["status"] = "Unable to save the review. Please try again.";
        }
    }
            
    if ($companyName) {
        $_SESSION["presets"]["company_name"] = $companyName;
    } else {
        $_SESSION["create_review_errors"]["company_name"] = "Company Name Required";
    }
    if ($jobTitle) {
        $_SESSION["presets"]["job_title"] = $jobTitle;
    } else {
        $_SESSION["create_review_errors"]["job_title"] = "Job Title Required";
    }
    if ($rating) {
        $_SESSION["presets"]["rating"] = $rating;
    } else {
        $_SESSION["create_review_errors"]["rating"] = "Rating Required";
    }
    if ($comment) {
        $_SESSION["presets"]["comment"] = $comment;
    } else {
        $_SESSION["create_review_errors"]["comment"] = "Comment Required";
    }
    header("Location: create_review.php");
