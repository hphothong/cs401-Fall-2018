<?php
    session_start();

    if (!isset($_SESSION["user"])) {
        header("Location: login.php");
    }
    
    require_once "header.php";
    require_once "banner.php";
    require_once "navbar.php";
    require_once "dao.php";
?>

<div class="content">

<?php
    if (isset($_SESSION["status"])) {
        echo "<div id='review_status'>{$_SESSION["status"]}</div>";
    }
?> 

<form id="review_form" method="post" action="create_review_handler.php">
    <div><label for="review_company_name" class="form_label">Company Name</label></div>
    <div><input type="text" id="review_company_name" name="company_name" value=<?php
        if (isset($_SESSION["presets"]["company_name"])) {
            echo "'" . $_SESSION["presets"]["company_name"] . "'>";
            unset($_SESSION["presets"]["company_name"]);
        } else {
            echo "''>";
        }
        if (isset($_SESSION["create_review_errors"]["company_name"])) {
            echo "<span class='create_review_errors'>{$_SESSION['create_review_errors']['company_name']}</span>";
        }
    ?></div>
    <div><label for="review_job_title" class="form_label">Job Title</label></div>
    <div><input type="text" id="review_job_title" name="job_title" value=<?php
        if (isset($_SESSION["presets"]["job_title"])) {
            echo "'" . $_SESSION["presets"]["job_title"] . "'>";
            unset($_SESSION["presets"]["job_title"]);
        } else {
            echo "''>";
        }
        if (isset($_SESSION["create_review_errors"]["job_title"])) {
            echo "<span class='create_review_errors'>{$_SESSION['create_review_errors']['job_title']}</span>";
        }
    ?></div>
    <div><label for="review_rating" class="form_label">Rating</label></div>
    <div>
        <select id="review_rating" name="rating" form="review_form">
            <?php
                for($i=1; $i<=10; $i++) {
                    if (isset($_SESSION["presets"]["rating"]) && $_SESSION["presets"]["rating"] == $i) {
                        echo "<option selected value='{$i}'>{$i}</option>";
                    } else {
                        echo "<option value='{$i}'>{$i}</option>";
                    }
                }
            ?>
        </select>
        <?php
            if (isset($_SESSION["create_review_errors"]["rating"])) {
                echo "<span class='create_review_errors'>{$_SESSION['create_review_errors']['rating']}</span>";
            }
        ?> 
    </div>
    <div><label for="review_comment" class="form_label">Comment</label></div>
    <div><input type="text" id="review_comment" name="comment" value=<?php
        if (isset($_SESSION["presets"]["comment"])) {
            echo "'" . $_SESSION["presets"]["comment"] . "'>";
            unset($_SESSION["presets"]["comment"]);
        } else {
            echo "''>";
        }
        if (isset($_SESSION["create_review_errors"]["comment"])) {
            echo "<span class='create_review_errors'>{$_SESSION['create_review_errors']['comment']}</span>";
        }
    ?></div>
    <div><input type="submit" id="review_submit_button" value="Submit Review"></div>
</form>

<?php
    unset($_SESSION["create_review_errors"]);
    unset($_SESSION["presets"]);
    require_once "footer.php";
