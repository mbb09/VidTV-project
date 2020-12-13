<?php

class CommentSection {
    private $con, $vid, $userLoggedInObj;
    public function __construct($con, $vid, $userLoggedInObj){
        $this->con = $con;
        $this->vid = $vid;
        $this->userLoggedInObj = $userLoggedInObj;
    }

    public function create(){
        return $this->createCommentSection();
    }

    public function createCommentSection(){

    }

    private function createPrimarySection(){
        $title = $this->vid->getTitle();
        $views = $this->vid->getViews();

        $vidControls = new VideoInfoControls();
        $controls = $vidControls->create();
        return "
            <div class = 'videoInfo'>
                <h1>$title</h1>
                <div class = 'bottomSection'>
                    <span class = 'viewCount'>
                        $views
                    </span>
                    $controls
                </div>
            </div>
        ";
    }

    private function createSecondarySection(){

    $description = $this->video->getDescription();
    $uploadDate = $this->video->getUploadedDate();
    $uploadedBy = $this->video->getUploadedBy();

    $userToObj = new User($this->con, $uploadedBy);
    $actionButton = ButtonProvider::createSubscriberButton($this->con, $userToObj, $this->userLoggedInObj);
    

    return "<div class='secondarysection'>
        <div class='topRow'>
        </div>

        </div>";
}
}

?>