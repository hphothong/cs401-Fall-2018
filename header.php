<!DOCTYPE html>
<?php include_once "functions.php"; ?>
<html>
	<head>
		<title>Internship Ratings</title>	
		<meta charset="UTF-8">
		<meta name="description" content="Internship reviewing website">
		<meta name="keywords" content="intern, interns, internship, internships, review, reviews">
		<meta name="author" content="Hayden Phothong">
        <link rel="icon" type="image/png" href="resources/IR2.png">
		<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
		<?php
			$useragent = $_SERVER['HTTP_USER_AGENT'];
			if (isMobile($useragent))
			{
				echo '<link rel="stylesheet" type="text/css" href="styles/mobile_styles.css">';
			}
			else
			{
				echo '<link rel="stylesheet" type="text/css" href="styles/desktop_styles.css">';
			}
		?>
	</head>
	<body>
		<a id="page_top"></a>
		<div id="header">
			<div id="banner">
				<a href="index.php">
					<img id="logo" src="resources/InternshipRatingsLogo.png">
				</a>
				<input id="search_bar" type="text" placeholder="Search for reviews..." maxlength=2048>
				<button id="login_button" class="button" type="button">Login</button>
				<button id="signup_button" class="button" type="button">Sign Up</button>
			</div>
		</div>
		<div class="navbar">
			<?php
				$navigationPages = Array(
					"Home" => "index.php",
					"Recent Reviews" => "recent_reviews.php",
					"Top Ratings" => "top_ratings.php",
					"Top Businesses" => "top_businesses.php",
					"Top Locations" => "top_locations.php"
				);
				$currentPageName = getCurrentPageName($navigationPages);
				foreach ($navigationPages as $linkName => $linkFilename)
				{
					if ($linkFilename === $currentPageName)
					{
						echo "<a id=\"currentPage\" href=\"{$linkFilename}\">{$linkName}</a>";
					}
					else
					{
						echo "<a href=\"{$linkFilename}\">{$linkName}</a>";
					}
				}
			?>
		</div>
		<div class="content">
		
