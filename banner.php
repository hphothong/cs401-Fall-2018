<?php
    session_start();
?>
<div id="banner_background">
    <div id="banner_content">
        <?php require_once "logo.php"; ?>
        <div class="search_bar banner">
            <form id="banner_search_bar">
	            <input id="search_bar" class="search_bar banner" type="text" name="q" placeholder="Search for reviews..." maxlength=2048>
            </form>
        </div>
        <?php if (isset($_SESSION["user"])) { ?>
            <div class='signout'>
                <a class='signout' href='account.php'><img id='login_image' src='resources/account_v1.1.png'></a>
                <a class='signout' href='signout.php'>Sign Out</a>
            </div>
        <?php } else { ?>
            <a class="banner" href="login.php"><div id="login_button" class="button banner">Login</div></a>
            <a class="banner" href="signup.php"><div id="signup_button" class="button banner">Sign Up</div></a>
        <?php } ?>
    </div>
</div>	
