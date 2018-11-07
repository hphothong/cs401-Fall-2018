<?php

class Review {

    private $ratingID;
    private $userID;
    private $userInternshipTitle;
    private $companyName;
    private $rating;
    private $comment;
    private $createDate;
    private $updateDate;

    public function __construct($ratingID, $userID, $userInternshipTitle, $companyName,
                                  $rating, $comment, $createDate, $updateDate) {
        $this->ratingID = $ratingID;
        $this->userID = $userID;
        $this->userInternshipTitle = $userInternshipTitle;
        $this->companyName = $companyName;
        $this->rating = $rating;
        $this->comment = $comment;
        $this->createDate = $createDate;
        $this->updateDate = $updateDate;
    }

    public function display() {
        echo "<div class='review_box'>
                    <div class='review_box_header'>
                        <span class='review_box_title'>{$this->userInternshipTitle}</span>";
        echo sprintf("<span class='review_box_rating'>%.1f/5.0</span>", $this->rating);
        echo "          <hr />
                    </div>
                    <div class='review_box_body'>
                        <span class='review_box_label'>Company:</span>
                        <span class='review_box_company'>{$this->companyName}</span>
                        <div class='review_box_comment'>
                            <div class='review_box_label'>Comment:</div>
                            <p class='review_box_comment'>{$this->comment}</p>
                        </div>
                    </div>
                    <div class='review_box_footer'>
                        <div class='review_box_update_date'>{$this->updateDate}</div>
                    </div>
                </div>";
    }

    public function getRatingID() {
        return $this->ratingID;
    }

    public function getUserID() {
        return $this->userID;
    }

    public function getUserInternshipTitle() {
        return $this->userInternshipTitle;
    }

    public function getCompanyName() {
        return $this->companyName;
    }

    public function getRating() {
        return $this->rating;
    }

    public function getComment() {
        return $this->comment;
    }
    
    public function getCreateDate() {
        return $this->createDate;
    }

    public function getUpdateDate() {
        return $this->updateDate;
    }

}
