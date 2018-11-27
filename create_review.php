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

 

    <form class="floating" id="review_form" method="post" action="create_review_handler.php">
        <div>
            <label for="review_company_name" class="form_label">Company Name</label>
            <?php
                if (isset($_SESSION["create_review_errors"]["company_name"])) {
                    echo "<span class='form_required_field'>{$_SESSION['create_review_errors']['company_name']}</span>";
                }
            ?>
        </div>
        <div><input type="text" id="review_company_name" class="form_textfield" name="company_name" value=<?php
            if (isset($_SESSION["presets"]["company_name"])) {
                echo "'" . $_SESSION["presets"]["company_name"] . "'>";
                unset($_SESSION["presets"]["company_name"]);
            } else {
                echo "''>";
            }
            
        ?></div>
        <div>
            <label for="review_job_title" class="form_label">Job Title</label>
            <?php
                if (isset($_SESSION["create_review_errors"]["job_title"])) {
                    echo "<span class='form_required_field'>{$_SESSION['create_review_errors']['job_title']}</span>";
                }
            ?>
        </div>
        <div><input type="text" id="review_job_title" class="form_textfield" name="job_title" value=<?php
            if (isset($_SESSION["presets"]["job_title"])) {
                echo "'" . $_SESSION["presets"]["job_title"] . "'>";
                unset($_SESSION["presets"]["job_title"]);
            } else {
                echo "''>";
            }
        ?></div>
        <div>
            <label for="review_rating" class="form_label">Rating</label>
            <?php
                if (isset($_SESSION["create_review_errors"]["rating"])) {
                    echo "<span class='form_required_field'>{$_SESSION['create_review_errors']['rating']}</span>";
                }
            ?>
        </div>
        <div>
            <select id="review_rating" class="form_textfield" name="rating" form="review_form">
                <?php
                    for($i=0.5; $i<=5; $i+=0.5) {
                        if (isset($_SESSION["presets"]["rating"]) && $_SESSION["presets"]["rating"] == $i) {
                            if ($i == 0.5) {
                                echo "<option selected value='{$i}'>{$i} (worst)</option>";
                            } else if ($i == 5) {
                                echo "<option selected value='{$i}'>{$i} (best)</option>";
                            } else {
                                echo "<option selected value='{$i}'>{$i}</option>";
                            }
                        } else {
                            if ($i == 0.5) {
                                echo "<option value='{$i}'>{$i} (worst)</option>";
                            } else if ($i == 5) {
                                echo "<option value='{$i}'>{$i} (best)</option>";
                            } else {
                                echo "<option value='{$i}'>{$i}</option>";
                            }
                        }
                    }
                ?>
            </select> 
        </div>
        <div>
            <label for="review_comment" class="form_label">Comment</label>
            <?php
                if (isset($_SESSION["create_review_errors"]["comment"])) {
                    echo "<span class='form_required_field'>{$_SESSION['create_review_errors']['comment']}</span>";
                }
            ?>
        </div>
        <div><input type="text" id="review_comment" class="form_textfield" name="comment" value=<?php
            if (isset($_SESSION["presets"]["comment"])) {
                echo "'" . $_SESSION["presets"]["comment"] . "'>";
                unset($_SESSION["presets"]["comment"]);
            } else {
                echo "''>";
            }
        ?></div>
        <div><input type="submit" class="submit_button" value="Submit Review"></div>
    </form>
    <?php
        if (isset($_SESSION["status"])) {
            echo "<div id='review_status'>{$_SESSION["status"]}</div>";
        }
    ?>
</div>
<?php
    unset($_SESSION["status"]);
    unset($_SESSION["create_review_errors"]);
    unset($_SESSION["presets"]);
    require_once "footer.php";
