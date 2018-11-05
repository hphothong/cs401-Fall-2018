<?php session_start();
    require_once "functions.php";
?>
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
