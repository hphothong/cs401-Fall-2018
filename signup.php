<?php
    session_start();
    require_once "header.php";
    require_once "banner.php";
?>

<div class="content">
    <div>
        <?php
            if (isset($_SESSION["signupError"])) {
                echo "<h1 class='signup_error'>{$_SESSION['signupError']}</h1>";
            }
        ?>
        <form class="floating" method="post" action="signup_handler.php">
            <div><label for="fname" class="form_label">First Name</label></div>
            <div><input type="text" id="fname" class="form_textfield" name="fname" value=<?php
                if(isset($_SESSION["presets"]["fname"])) {
                    echo "'{$_SESSION["presets"]["fname"]}'";
                    unset($_SESSION["presets"]["fname"]);
                } else {
                    echo "''";
                } ?>></div>
            
            <div><label for="lname" class="form_label">Last Name</label></div>
            <div><input type="text" id="lname" class="form_textfield" name="lname" value=<?php 
                if(isset($_SESSION["presets"]["lname"])) {
                    echo "'{$_SESSION["presets"]["lname"]}'";
                    unset($_SESSION["presets"]["lname"]);
                } else {
                    echo "''";
                } ?>></div>
            
            <div><label for="degree" class="form_label">Degree</label></div>
            <div><input type="text" id="degree" class="form_textfield" name="degree" value=<?php 
                if(isset($_SESSION["presets"]["degree"])) {
                    echo "'{$_SESSION["presets"]["degree"]}'";
                    unset($_SESSION["presets"]["degree"]);
                } else {
                    echo "''";
                } ?>></div>
            
            <div>
                <label for="email" class="form_label">Email</label>
                <?php
                    if (isset($_SESSION["signupErrors"]["email"])) {
                        echo "<span class='form_required_field'>{$_SESSION['signupErrors']['email']}</span>";
                    }
                ?>
            </div>
            <div><input type="text" id="email" class="form_textfield" name="email" value=<?php  
                if(isset($_SESSION["presets"]["email"])) {
                    echo "'{$_SESSION["presets"]["email"]}'";
                    unset($_SESSION["presets"]["email"]);
                } else {
                    echo "''";
                } ?>></div>
            
            <div>
                <label for="password" class="form_label">Password</label>
                <?php
                    if (isset($_SESSION['signupErrors']['password'])) {
                        echo "<span class='form_required_field'>{$_SESSION['signupErrors']['password']}</span>";
                    }
                ?>
            </div>
            <div><input type="password" id="password" class="form_textfield" name="password"></div>
            
            <div>
                <label for="password_verify" class="form_label">Password (again)</label>
                <?php
                    if (isset($_SESSION['signupErrors']['passwordVerify'])) {
                        echo "<span class='form_required_field'>{$_SESSION['signupErrors']['passwordVerify']}</span>";
                    }
                ?>
            </div>
            <div><input type="password" id="password_verify" class="form_textfield" name="passwordVerify"></div>
            <div><input type="submit" class="submit_button" value="Create Account"></div>
        </form>
        <a href="login.php">Sign In</a>
    </div>
</div>
<?php

unset($_SESSION["signupErrors"]);
unset($_SESSION["signupError"]);
unset($_SESSION["presets"]);
require_once "footer.php";
