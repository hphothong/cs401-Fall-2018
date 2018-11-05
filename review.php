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
                        <span class='review_box_title'>{$this->userInternshipTitle}</span>
                        <span class='review_box_rating'>{$this->rating}</span>
                    </div>
                    <div class='review_box_body'>
                        <div class='review_box_company'>{$this->companyName}</div>
                        <p class='review_box_comment'>{$this->comment}</p>
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
