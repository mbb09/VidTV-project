<?php include_once("header.php");?>
<?php include_once("classes/UploadData.php");?>
<?php include_once("classes/VidProcessor.php");?>
<?php include_once("classes/watch.php");?>
<?php
    if(isset($_SESSION["userLoggedIn"])) {
        echo "Welcome user " . $userLoggedInObj->getUserName() . $userLoggedInObj->getSignUpDate();
        $watch = new watch($con);
        $watch->queryVids();
    }
?>
<?php include_once("footer.php");?>