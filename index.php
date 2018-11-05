<?php

session_start();

require_once "header.php";
require_once "banner.php";
require_once "navbar.php";
require_once "dao.php";
require_once "review.php";

echo "<div class='content'>";

$dao = new Dao();
$reviews = $dao->getReviews();

foreach ($reviews as $review) {
    if (isset($_SESSION["user"]) && $review->getUserID() == $_SESSION["user"]) {
        echo "<span>X</span>";
    }
    $review->display();
}

echo "</div>";

require_once "back_to_top.php";
require_once "footer.php";
