<?php 
    require_once "header.php";
    session_start();
?>

<div class="content">
    <div>
        <a href="index.php"><img class="login_logo" src="resources/IR2.png"></a>
    </div>
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
        <form method="post" action="login_handler.php">
            <div><label for="login" class="form_label">Email</label></div>
            <div><input type="text" id="login" name="email"></div>
            <div><label for="password" class="form_label">Password</label></div>
            <div><input type="password" id="password" name="password"></div>
            <div><input type="submit" id="submit_button" value="login"></div>
        </form>
        <a href="signup.php">Sign Up</a>
    </div>
<?php require_once "footer.php";
