<?php 

session_start();

require_once "header.php";
require_once "banner.php";
?>

<div class="content">
    <div>
        <h1 class=
        <?php
            if (isset($_SESSION["loginError"])) {
                echo "'login_error'";
                unset($_SESSION["loginError"]);
            } else {
                echo "'hidden'";
            }
        ?>
        >Username or password is incorrect</h1>
        <form class="floating" method="post" action="login_handler.php">
            <div><label for="login" class="form_label">Email</label></div>
            <div><input type="text" id="login" class="form_textfield" name="email"></div>
            <div><label for="login_password" class="form_label">Password</label></div>
            <div><input type="password" id="login_password" class="form_textfield" name="password"></div>
            <div><input type="submit" id="submit_login_button" value="login"></div>
        </form>
        <a href="signup.php">Sign Up</a>
    </div>
</div>
<?php require_once "footer.php";
