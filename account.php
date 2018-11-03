<?php
    session_start();
    require_once "header.php";
    require_once "banner.php";
?>
<div class="content">
    <h1 class="title">Account Information</h1>
    <h2 class="subtitle">Email</h2>
    <?php
        echo "<h3 class='detail'>{$_SESSION['user']}</h3>";
        
        require_once "footer.php";
