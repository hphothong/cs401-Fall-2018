<?php

require_once "header.php";
require_once "banner.php";
require_once "navbar.php";
require_once "dao.php";

echo "<div class='content'>";

$dao = new Dao();
$reviews = $dao->getReviews("update_date", "DESC");

foreach ($reviews as $review) {
    $review->display();
}

echo "</div>";

require_once "back_to_top.php";
require_once "footer.php";
