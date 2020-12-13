<?php

class UploadData {

    private $videoDataArray, $title, $description, $privacy, $category, $uploadedBy;

    //constructor
    public function __construct($videoDataArray, $title, $description, $privacy, $category, $uploadedBy) {
        $this->videoDataArray = $videoDataArray;
        $this->title = $title;
        $this->description = $description;
        $this->privacy = $privacy;
        $this->category = $category;
        $this->uploadedBy = $uploadedBy;
    }

    public function getVideoDataArray() {
        return $this->videoDataArray;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrivacy() {
        return $this->privacy;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getUploadedBy() {
        return $this->uploadedBy;
    }
}


?>