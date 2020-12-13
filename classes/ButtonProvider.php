<?php

class ButtonProvider {
    public static function createButton($text, $class, $imageSrc, $action){
        //if img is not null
        $image = ($imageSrc==null) ? "": "<img src='$imageSrc'>";
        return "<button class='$class' onclick='$action'>
            $image
        <span class='text'>
            $text
        </span>
        </button>
        ";
    }

    public static function createSubscriberButton($con, $userToObj, $userLoggedInObj){
        //grab the user who uploaded the vid
        $userTo = $userToObj->getUserName();
        //getting username of user currently logged in
        $userLoggedIn = $userLoggedInObj->getUserName();

        $isSubscribedTo = $userLoggedInObj->isSubscribed($userTo);

        $buttonText .= $isSubscribedTo ? "SUBSCRIBED" : "SUBSCRIBE";

        $buttonClass = $isSubscribedTo ? "unsubscribe button" : "subscribe button";

        $action = "subscribe(\"$userTo\", \"$userLoggedIn\", this)";

        $button = ButtonProvider::createButton($buttonText, $buttonClass, null, $action);

        return "
            <div class='subscribeButtonContainer'>
                $button
            </div>
        ";
    }
}

?>