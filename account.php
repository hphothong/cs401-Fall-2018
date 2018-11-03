<?php
    session_start();
    require_once "header.php";
    require_once "banner.php";
?>
<div class="content">
    <h1 class="title">Account Information</h1>
    <h2 class="subtitle">Email</h2>
    <h3 class="detail"><?php echo $_SESSION['user'] ?></h3>
    <h2 class="subtitle">Delete Account</h2>
    <form action="delete_account.php">
        <input type="submit" value="Delete Account">
    </form>

<?php require_once "footer.php";
