<?php
    session_start();
?>
<div id="banner_background">
    <div id="banner_content">
        <div id="logo"><a href="index.php"><img src="resources/IR_Logo.png"></a></div>
        <h1 id="website_title">Internship Ratings</h1>
        <div class="search_bar banner">
            <form action="search.php">
	            <input id="search_bar" class="search_bar banner" type="text" name="q" placeholder="Search for reviews..." maxlength=2048>
            </form>
        </div>
        <?php if (isset($_SESSION["user"])) { ?>
            <div class='signout'>
                <a class='signout' href='account.php'><img id='login_image' src='resources/account.png'></a>
                <a class='signout' href='signout.php'>Sign Out</a>
            </div>
        <?php } else { ?>
            <a class="banner" href="login.php"><div id="login_button" class="button banner">Login</div></a>
            <a class="banner" href="signup.php"><div id="signup_button" class="button banner">Sign Up</div></a>
        <?php } ?>
    </div>
</div>	
