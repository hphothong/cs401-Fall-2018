<?php

require_once "header.php";
require_once "banner.php";
require_once "navbar.php";

echo "<div class='content'>";

for($i = 0; $i < 25; $i++) {

	echo "<div class='box'>box {$i}</div>";
}

include_once "footer.php";
