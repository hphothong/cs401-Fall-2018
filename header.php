<!DOCTYPE html>
<html>
	<head>
		<title>Internship Ratings</title>	
		<meta charset="UTF-8">
		<meta name="description" content="Internship reviewing website">
		<meta name="keywords" content="intern, interns, internship, internships, review, reviews">
		<meta name="author" content="Hayden Phothong">
		<?php
			include_once "detect_mobile.php";
			$useragent = $_SERVER['HTTP_USER_AGENT'];
			if (isMobile($useragent))
			{
				echo '<link rel="stylesheet" type="text/css" href="styles/mobile_styles.css">';
			}
			else
			{
				echo '<link rel="stylesheet" type="text/css" href="styles/styles.css">';
			}
		?>
	</head>
	<body>
		<div id="header">
			<a id="page_top"></a>
			<div id="banner">
				<a href="index.php">
					<img src="InternshipRatingsLogo.php">
				</a>
				<input type="text" name="search" placeholder="Search for reviews..." maxlength=2048>
				<button id="login_button" class="button" type="button">Login</button>
				<button id="sign_up_button" class="button" type="button">Sign Up</button>
			</div>
			<div id="navbar">
				<ul>
					<li>
						<a href="index.php">Home</a>
					</li>
					<li>
						<a href="recent_reviews.php">Recent Reviews</a>
					</li>
					<li>
						<a href="top_ratings.php">Top Ratings</a>
					</li>
					<li>
						<a href="top_businesses.php">Top Businesses</a>
					</li>
					<li>
						<a href="top_locations.php">Top Locations</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="content">
