<?php
session_start();

require_once "header.php";
require_once "banner.php";
require_once "dao.php";
$dao = new Dao();
?>

<div class="content">
    <h1 class="title">Account Information</h1>
    <h2 class="subtitle">Email</h2>
    <h3 class="detail"><?php echo htmlentities($dao->getUserEmail($_SESSION['user']))?></h3>
    <form action="delete_account.php">
        <input type="submit" value="Delete Account">
    </form>
</div>

<?php
require_once "footer.php";
