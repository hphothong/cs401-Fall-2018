<?php
    session_start();
?>
<div>
    <div id="banner_background">
        <div id="logo"><a href="index.php"><img src="resources/IR_Logo.png"></a></div>
        <div class="search_bar banner">
            <form action="search.php">
	            <input id="search_bar" class="search_bar banner" type="text" name="q" placeholder="Search for reviews..." maxlength=2048>
            </form>
        </div>
        <?php if (isset($_SESSION["user"])) {
            echo "<div class='banner'>
                    <a class='banner' href='account.php'><img src='resources/account.png'></a>
                    <a href='signout.php'>Sign Out</a>
                </div>";
        } else {
            echo '<a class="banner" href="login.php"><div id="login_button" class="button banner">Login</div></a>';
            echo '<a class="banner" href="signup.php"><div id="signup_button" class="button banner">Sign Up</div></a>';
        }
        ?>
    </div>
</div>
		
