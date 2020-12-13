<?php

require_once("ButtonProvider.php");

class VidInfoControls {
    private $vid, $userLoggedInObj;
    public function __construct($vid, $userLoggedInObj){
        $this->vid = $vid;
        $this->userLoggedInObj = $userLoggedInObj;
    }

    public function create(){
        $likeButton = $this->createLikeButton();
        $dislikeButton = $this->createDislikeButton();

        return "
        <div class='controls'>
            $likeButton
            $dislikeButton
        </div>
        ";
    }

    private function createlikeButton(){
        $text=$this->video->getLikes();
        $class="likeButton";
        $imageSrc="C:/xampp/htdocs/VidTV/icons/like.png";
        $action="likeVideo(this, $vidID)";
        $vidID=$this->video->getID();
        return ButtonProvider::createButton($text,$class,$imageSrc,$action);
    }

    private function createDislikeButton(){
        return "<button>Dislike</button>";
    }


}

?>